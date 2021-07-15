<?php
namespace App\Controllers;

use App\Core\AuthUser;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use Core\Controller;
use Core\Helper;
use Core\Session;
use App\Controllers\UserController;
use App\Models\Address;

class CartController extends Controller
{
    private $user;
    private $cart;
    private $order;
    public function __construct()
    {
        // parent::__construct();
        $this->user = new User;
        $this->cart = new Cart;
        $this->order = new Order;
    }
    /**
     * If user login already so save product to database
     * else saving to session
     */
    public function add()
    {
        # get link will return after handle
        $pattern = preg_replace('/\//i', '\/', $_SERVER['HTTP_ORIGIN']);
        $linkReturn = preg_replace('/'.$pattern.'/', '',$_SERVER['HTTP_REFERER'] );
      
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            //product_id
            $idProduct = (isset($_POST['product_id'])) ?  (int)$_POST['product_id'] : '';
            $quantity = (isset($_POST['num-product'])) ?  (int)$_POST['num-product'] : '';
            #already login
            if (isset($_COOKIE['username']) && $idProduct != '') {
                $result = $this->user->get($_COOKIE['username']);
                if ($result == NULL) {
                    # If not exist this user so delete Cookie
                    setcookie('username', time()-__TIME_COOKIE, '/');
                    # Add to card by session
                    return Helper::redirect('user/login');
                }
                $idUser = (int)$this->user->get($_COOKIE['username'])['id'];
                
                # this user not have product
                $result = $this->cart->get($idUser);
                // dd($result);
                if ($result->num_rows == 0) {
                    $result = $this->cart->insert($idUser, $idProduct, $quantity);
                    return Helper::reload();
                } else {
                    
                    while ($row = $result->fetch_assoc()){
                     
                        if ($row['id_product'] == $idProduct) {
                            $quantityExist = $row['quantity'];
                            
                            $result = $this->cart->update($row['id'], $quantityExist + $quantity);                            
                            return Helper::reload();
                        }
                         $result = $this->cart->insert($idUser, $idProduct, $quantity);                           
                         return Helper::reload();
                    }
                }

            } else { //not login => save to session
                $carts = isset($_SESSION['carts']) ? $_SESSION['carts'] : NULL;
                
                # not exist cart
                if (is_null($carts)) {
                    $_SESSION['carts'][$idProduct] = $quantity;                    
                    return Helper::reload();                    
                }  
                # exist cart
                if (isset($_SESSION['carts'][$idProduct])) {
                    $_SESSION['carts'][$idProduct] =  $_SESSION['carts'][$idProduct] + $quantity; 
                    return Helper::reload();   
                    
                }
                #exist cart but not exist product
                    $_SESSION['carts'][$idProduct] =  $quantity; 
                    return Helper::reload();                 
            }

        }
        
    }

    public function show($idUser = 0)
    {
       $result = $this->cart->get($idUser);
       return $result;
    }
    public function get($idUser = 0)
    {
       $result = $this->cart->get($idUser);
       return $result;
    }
    public function shopingCart()
    {
        $productCart = [];
        $total = 0;
        $cart = new \App\Controllers\CartController;
        $user = new \App\Controllers\UserController;
        $product1 = new \App\Controllers\ProductController;

        if (isset($_COOKIE['username'])) {						
            $idUser = $user->getID($_COOKIE['username']);						
            $result = $this->cart->get($idUser);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {								
                    array_push($productCart, $row);							
                }							
            }							
        }					
        if (isset($_SESSION['carts']) && !isset($_COOKIE['username'])) {	
            $productCart_id = $_SESSION['carts'];
            foreach ($productCart_id as $key => $value) {
                $result = $product1->get($key);	
                $result['id_product'] = $result['id'];				
                $result['quantity']	= $value;
                array_push($productCart, $result);	
            }
        }
        // dd($productCart);
        $this->loadView('main',[
            'template' => '/cart/shopingCart',
            'productCart_show' => $productCart
        ]);
    }
    public function delete()
    {       
        $cart = new \App\Controllers\CartController;
        $user = new \App\Controllers\UserController;
       if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idProduct = (isset($_POST['id'])) ? (int)$_POST['id'] : NULL;
            if ($idProduct != NULL) {
                if (isset($_COOKIE['username'])) {	 					
                    $idUser = $user->getID($_COOKIE['username']);						
                    if (!is_null($idUser)) {
                        $this->cart->delete($idProduct);
                       
                        return json([
                            'error'=> false,
                            'id' => $idProduct
                        ]);                       
                        
                    }				
                }
                #Chua login
                unset($_SESSION['carts'][$idProduct]);
                return json([
                    'error'=> false,
                    'id' => $idProduct
                ]);
            }
       }
    }

    public static function countItem()
    {
        $cart = new Cart;
        $user = new \App\Controllers\UserController;
        if (isset($_COOKIE['username'])) {
       
             $idUser = $user->getID($_COOKIE['username']);
            
             if (!is_null($idUser)) {
                   
                 $result = $cart->get($idUser);
               
                return $result->num_rows;
             }
        }
        if(isset($_SESSION['carts'])) {
            return sizeof($_SESSION['carts']);
        }
        return 0;
    }
    public function pay($getinfor = "")
    {
        // dd($_POST);
        $user = new UserController;
        $email = (isset($_COOKIE['username'])) ? $_COOKIE['username'] : '';
        $userInfo = $user->show($email);
        if ($getinfor == '') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {            
                $postq = $_POST;
                // dd(($postq));
                if (sizeof($postq) > 1) {
                    $html = '';
                    $arr_key = array_keys($postq);
                    $html .= '<thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>  
                                    <th>id</th> 
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>';
                    $html .= '<tbody>';
                    $html .= '<tr>';
                    $i = 0;
                    $html .= '<td>' . ++$i . '</td>';
                
                    foreach($arr_key as $key => $value) {
                        $nxt = next($arr_key);
                        $arr = explode('-', $value);                                           
                        $html .= '<td class = "'.$nxt.'">' . $postq[$value].'</td>';
                    
                        if ($nxt == 'total') break;
                        if($arr[0] == 'outPrice' && $nxt != 'total' && $nxt != false  && $nxt != null) {
                            $html .= '</tr>';                    
                            $html .= '<tr>';
                            $html .= '<td>'. ++$i .'</td>';                                                
                        }   
                                    
                    }
                    $html .= '</tbody>';
                    
                    $total = (isset($_POST['total'])) ? $_POST['total'] : 0;
                
                    Session::addFlash('listProduct', $postq); //lưu sản phẩm vào session
                    $Adress = new Address;
                    // dd($total);
                    $this->loadView('main',[
                        'template' => 'cart/pay',
                        'list' => $html,
                        'totalcost' => $total,
                        'customer'  => $userInfo,
                        'province' =>  $Adress->getProvince()
                    ]);
                } else {
                    Session::addFlash('error', 'Chưa có sản phẩm trong giỏ hàng');
                    return Helper::redirect('/shoping-cart.html');
                }
                
                
            }

        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return $userInfo;
        }
        
          
    }
 
    public function order()
    {       
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            #Giao đến địa chỉ khác
            if(isset($_POST['otherPlace'])) {
                # Validate infor other place
                if (isset($_POST['name'])) {
                    if ($_POST['name'] == '') {
                        Session::addFlash('error', 'Vui lòng điền đầy đủ thông tin của người nhận hàng');
                        return Helper::redirect('/shoping-cart.html');
                    }
                }
                if (isset($_POST['phone'])) {
                    if ($_POST['phone'] == '') {
                        Session::addFlash('error', 'Vui lòng điền đầy đủ thông tin của người nhận hàng');
                        return Helper::redirect('/shoping-cart.html');
                    } else {
                        $phoneNumber = $_POST['phone'];
                        $result = \App\Helpers\Validate::validate_phone($phoneNumber);
                        if ($result['error'] == true) {
                            Session::addFlash('error', $result['message']);
                            return Helper::redirect('/shoping-cart.html');
                        }
                    }
                }
                if (!isset($_POST['address']) || !isset($_POST['province']) || !isset($_POST['district']) || !isset($_POST['ward'])) {  
                    Session::addFlash('error', 'Lỗi form, vui lòng thực hiện lại thao tác đặt hàng hoặc báo lại cho cskh. Xin cám ơn');
                    return Helper::redirect('/shoping-cart.html');
                }
                                   
                if (($_POST['address'] == '') || ($_POST['province'] == '0') || ($_POST['district'] == '0') || ($_POST['ward'] == '0')) {             
                    Session::addFlash('error', 'Vui lòng nhập đầy đủ địa chỉ của người nhận hàng');
                    return Helper::redirect('/shoping-cart.html');
                }
                    
                
                #Validate finish
                $name = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
                $phone = isset($_POST['phone']) ? Helper::makeSafe($_POST['phone']) : '';
                $address = $_POST['address'] . ' ' . $_POST['ward'] .  ' ' .$_POST['district'] .  ' ' .$_POST['province'];
            }
            $inforMember = $this->pay('get');
             $listProduct = [];
            if(isset($_SESSION['listProduct'])) {
                $listProduct = $_SESSION['listProduct'];
                unset($_SESSION['listProduct']);
            }
            if ($inforMember == NULL && !isset($_POST['otherPlace'])) {
                Session::addFlash('error', 'Bạn chưa đăng kí thành viên, Xin vui lòng nhập thông tin giao hàng check vào mục giao đến địa chỉ khác hoặc đăng kí');
                return Helper::redirect('/shoping-cart.html');
            }
            $inforOrder = [];
            if ($inforMember != NULL) { //đã login
                if (isset($_POST['otherPlace'])) { //Có thông tin thành viên nhưng chọn giao đến địa chỉ khác
                    $inforOrder = [
                        'name' => $name,
                        'phone' => $phone,
                        'address' => $address
                    ];
                } else { //Có thông tin thành viên và không chọn giao đến địa chỉ khác
                    $inforOrder = [
                        'name' => $inforMember['name'],
                        'phone' => $inforMember['phone'],
                        'address' => $inforMember['address']
                    ];
                }
                /*
                $inforOrder
                $informember
                $listProduct
                */
            } else { //chưa login
                $inforOrder = [
                    'name' => $name,
                    'phone' => $phone,
                    'address' => $address
                ];
            }
           
            $Order_model = new Order;
            $note = '';
            $keyProduct = [];
            
            foreach ($listProduct as $key=>$value) {
                $expl = explode('-', $key);  
                $note .=  $key  . '=>' . $value . ',';
                if ($expl[0] == 'id' || $expl[0] == 'quantity' ) {
                    $keyProduct[$key] = $value;
                }                
            }

            
            $note = substr($note,0,-1);     
            if (is_null($inforMember['id'])) $inforMember['id'] = 0;
            $id_order = $Order_model->add($inforMember['id'], $inforOrder['name'], $inforOrder['phone'], $inforOrder['address'],$note, $listProduct['total']);
           
            $result = $Order_model->add_products($keyProduct, $id_order);
            $result = $this->cart->delete_byUser($inforMember['id']);
            unset($_SESSION['carts']);

            if ($inforMember['email'] != NULL) {
                $mail = new \App\Controllers\Mail;
                $mail->confirmOrder($inforMember['email'], $inforOrder, $listProduct);
                return Helper::redirect('/order/success-email');
            }
            return Helper::redirect('/order/success-'.$id_order);

        }
    }
    public function sendMailView()
    {
        $this->loadView('main', [
            'template' => 'user/sendMailOrder'
        ]);
    }

    public function orderSuccess($id= 0)
    {
        if($id != 0) {
            $id = (int)$id;
            $listProduct = $this->order->getProduct($id);
            // dd($listProduct);
            if ($listProduct != NULL) {
                $this->loadView('main', [
                    'template' => 'cart/success',
                    'id' => $id,
                    'listProduct' => $listProduct
                ]);
            }
            
        }
        
    }
}
