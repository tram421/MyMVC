function deleteRow(id = 0, url = "") {
  if (confirm("Xóa và không thể khôi phục, bạn có chắc chắn?")) {
    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: { id },
      url: url,
      success: function(result) {
      
        alert(result.message);
        if (result.error == true) {
          location.reload();
        }
        if (result.error == false) {
          location.reload();
        }
      }
    });
  }
}

$('#file').change(function(){
  var formData = new FormData();
  formData.append('file', $(this)[0].files[0]);
if (confirm('Nhấn OK để tải lên')) {
  $.ajax({
      processData : false,
      contentType : false,
      type        : 'POST',
      dataType    : 'JSON',
      data        : formData,
      url         : '/admin/upload/add',
      success     : function(result){
         if (result.error == false) {

            $('#url_file').val("/" + result.url);
            const html = '<a href="/' + result.url + '" target="_blank"><img src="/' + result.url + '" width="100px"></a>';
            $("#thumb").html(html);

         } else {
            // alert('lỗi');
            if (result.message == 'File ảnh đã tồn tại') {
              if (confirm("Lỗi! " + result.message + ". Nhấn ok để vẫn tải lên")) {
                $.ajax({
                  processData: false,
                  contentType: false,
                  type: "POST",
                  dataType: "JSON",
                  data: formData,
                  url: "/admin/upload/add/1",
                  success: function(result) {
                    if (result.error == false) {
                      $("#url_file").val("/" + result.url);
                      const html =
                        '<a href="/' +
                        result.url +
                        '" target="_blank"><img src="/' +
                        result.url +
                        '" width="100px"></a>';
                      $("#thumb").html(html);
                    } else {
                      alert("Lỗi: " + result.message);
                    }
                  }
                });
              } else { //nhấn nút cancel
                
              }
            } else {
              alert("LỖI: " + result.message);
            }
           

         }
      }
  })
}


});


function sendRequest($message = '', id = 0, url = "") {
  if (confirm($message)) {
    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: { id },
      url: url,
      success: function(result) {        
          location.reload();        
      }
    });
  }
}





function upSimple()
{
      var formData = new FormData();
    formData.append("file", $("#file_repair")[0].files[0]);
    if (confirm("Nhấn OK để tải ảnh lên")) {
      $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        dataType: "JSON",
        data: formData,
        url: "/admin/upload/add",
        success: function(result) {
            $("#url_file_repair").val("/" + result.url);
            const html = '<a href="/' + result.url + '" target="_blank"><img style = "width : 200px" src="/' + result.url + '" width="100px"></a>';
            $("#thumb1").html(html);
            if (result.error == true && result.message != "File ảnh đã tồn tại") {
              $("#thumb1").append("<p></p><span style = 'color : red'>Error: " + result.message + "</span>");
            }
            if (result.message == 'File ảnh đã tồn tại') {
              $("#thumb1").append("<span style = 'color : green'>This image already exist, so can't upload to folder, but you can use it to your work</span>");
            }
        }
      });
    }    
}

function addSlideForm()
{
  $("#addSlideForm").empty();
  if ($("#addSlideForm").val() == '') {
    var html = '';
    html += '<form action = "/admin/slide/add" method = "POST" enctype="multipart/form-data">';
    html += '<div class="card card-info mt-1 ml-4 mr-4"> ' +
              '<div class="card-header bg-yellow">'+
                  '<h3 class="card-title">Slide prepair add to web</h3>'+
              '</div> '   +     
              '<div class="card-body">'+
              '<div class="row">'+
                  '<div class="col-md-12">'+

                      '<div class="form-group">'+
                          '<label for="">Image:</label>'+
                          '<input type="file"  id = "file_repair" onchange = "upSimple()" name="file" class="form-control">'+
                          '<div id="thumb1">'+
                              
                          '</div>'+
                          '<input type="hidden" name="file" value="" id="url_file_repair">'+
                      '</div>'+

                  '</div>'+
              '</div>'+
              '<label for="">Content:</label>'+
              '<div class="row">'+
                  
                  '<div class="col-md-4">'+
                      '<div class="input-group mb-3">'+
                          '<div class="input-group-prepend">'+
                          '<span class="input-group-text">Main content</span>'+
                          '</div>'+
                          '<input type="text" class="form-control" placeholder="Main content" name = "main_content" value = "">'+
                      '</div> '+
                  '</div>'+
                  '<div class="col-md-4">'+
                      '<div class="input-group mb-3">'+
                          '<div class="input-group-prepend">'+
                          '<span class="input-group-text">Mini content</span>'+
                          '</div>'+
                          '<input type="text" class="form-control"  name = "mini_content" placeholder="Mini content" value = "">'+
                      '</div>' +
                  '</div>'+
                  '<div class="col-md-4">'+
                      '<div class="input-group mb-3">'+
                          '<div class="input-group-prepend">'+
                          '<span class="input-group-text">Button content</span>'+
                          '</div>'+
                          '<input type="text" class="form-control" name = "button_content" placeholder="Button content" value = "">'+
                      '</div>' +
                  '</div>'+
              '</div>'+
              '<div class="row">'+
                  '<div class="col-md-2">'+
                      '<label for="">Order: </label>'+
                      '<input type="number" name = "sort_by" value = "" class="form-control">'+
                  '</div> ' +      
              '</div>'+
              '<div class="custom-control custom-checkbox">'+

                  '<input type="checkbox" class="form-check-input" id="check1" name = "is_public" value = "1" checked="" >'+
                  '<label class="is_public" for="check1">Public</label>'+
              '</div>'+
              
              '</div>'+
              '<div class="card-footer">'+
                  '<button type="submit" class="btn btn-primary">Save</button>'+
              '</div>'+
          '</div>';
        html += '</form>';
    $("#addSlideForm").append(html);
  }
  
}
    /*
id	"40"
name	"Nguyễn Hoàng Mai Trâm"
receiver_name	"Nguyễn Hoàng Mai Trâm"
receiver_phone	"0123456789"
receiver_address	"5A, Phó Cơ Điều, Phường 8, Thành phố Vĩnh Long, Vĩnh Long"
state	"create"
created_at	"2021-07-13 18:30:37"
quantity	"5"
product_id	"8"
product_name	"Tivi Samsung 2"
product_price	"9000000"
product_sale	"7990000"
product_file	"/uploads/2021/05/31/tv02.jpg"
category_name	"Tivi SamSung"
     */
function showOrderDetail(id = 0) {
   $("#show-item-" + id).removeClass("hide");
  $('#show-item-'+id).addClass('show');
  $.ajax({
    
      type : 'POST',
      dataType : 'JSON',
      url : '/admin/order/getInfo',
      data : {id},
      success: function(result){
        
        let html = '';
        html += "<div class='row'>";
        html += "<div class='col-4'>";
        html += "<h4>Thông tin tài khoản</h4>";
        if (result[0].idUser != 0) {
          html += "<h6> <strong>ID: </strong>" + result[0].idUser + "</h6>";
          html += "<h6> <strong>Email: </strong>" + result[0].email + "</h6>";
          html += "<h6> <strong>Tên tài khoản: </strong>" + result[0].name + "</h6>";
          html += "<h6> <strong>ĐT: </strong>" + result[0].phone + "</h6>";
          html += "<h6> <strong>Địa chỉ: </strong>" + result[0].address + "</h6>";
        } else {
          html += "<h6>" + "Khách hàng chưa đăng kí"+ "</h6>";
          
        }
        html += "</div>";
        html += "<div class='col-8'>";
        html += "<table class='table'>"+
                  "<thead>" +
                  "<tr>"+
                  "<td style='max-width:50px'><b>STT</b></td>"+
                  "<td style='max-width:50px'><b>ID</b></td>"+
                  "<td style='min-width:200px'><b>Tên</b></td>"+
                  "<td><b>Hình ảnh</b></td>"+
                  "<td style='max-width:60px'><b>Số lượng</b></td>"+
                  "<td><b>Đơn giá</b></td>"+
                  "<td><b>Thành tiền</b></td>"+
                  "</tr>"+                  
                  "</thead>";
         html += "<tbody>"
             
        for (let key in result) {
          html += "<tr>"; 
          let data = result[key];
            html += "<td>"+ ++key +"</td>";
            html += "<td>" + data.product_id + "</td>";
            html += "<td>" + data.product_name + "</td>";
            html += "<td><img  style='width:50px' src='" + data.product_file + "'</td>";
            html += "<td>" + data.quantity + "</td>";
            let price_sale = parseInt(data.product_sale);
            price_sale = price_sale.toLocaleString(undefined,{
                minimumFractionDigits: 0
              });
            html += "<td>" + price_sale + "đ</td>";
            let cost = data.product_sale * data.quantity;
            cost = cost.toLocaleString(undefined, {
              minimumFractionDigits: 0
            });
            html += "<td>" + cost + "đ</td>";
            html += "</tr>";
        }
        
        html += "</tbody>"; 
        html += "</table>";
        html += "</div>";
        
        $("#show-info-"+id).html(html);
      }

    
  });

}
function closeOrderDetail(id=0)
{
   $("#show-item-" + id).removeClass("show");
   $("#show-item-" + id).addClass("hide");
}
function addShipCost(id = 0)
{
  let value = $("#shipcost-"+id).val();
  let cost = $("#cost-" + id).val();
  value = parseInt(value);
  cost = parseInt(cost);
  
  if (isNaN(value) == true) {
    alert("Vui lòng nhập số");
  } else {
    var total = cost + value;
    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: '/admin/order/storeShipCost',
      data:{id, value, total},
      success: function(result){
        if (result == 'success') {
          location.reload();
        }
        
      }
    });
  }
 
  // value = parseInt(value);
  // console.log(value);
}





