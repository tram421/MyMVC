/*
* Description:      This function will handle when user click on button "Load more" at product pages
* Input param is:   menu_id (category) 
* Result:           html list of next products (8 item next) of category has id in param
* Call to:          route service/product to call ProductController and loadmore function
*/
function loadMoreProduct(category) {

    var page = parseInt($('#page').val()) + 1;
    var html = "";
    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: { page, category },
      url: "/services/product",
      success: function(result) {
        if (result.error == false) {
            html = '<div class= "row isotope-grid">';
            for (let i in result.data) {
                html += '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" >' +
                            '<div class="block2">'+
                                '<div class="block2-pic hov-img0">'+
                                    '<img src="'+ result.data[i].file +'" alt="IMG-PRODUCT">'+
                                    '<a onclick=" showMoreInfo(' + result.data[i].id + ')" style = "cursor:pointer"'+
                                        'class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">'+
                                        'Quick View'+
                                    '</a>'+
                                '</div>'+
                                '<div class="block2-txt flex-w flex-t p-t-14">'+
                                    '<div class="block2-txt-child1 flex-col-l ">'+
                                        '<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">'+
                                            result.data[i].name +
                                        '</a>'+
                                        '<del class="stext-105 cl3">'+
                                            result.data[i].price +
                                        '</del>'+
                                        '<span class="stext-105 cl3 color-red mtext-104">'+
                                            result.data[i].price_sale +
                                        '</span>'+
                                    '</div>'+
                                    '<div class="block2-txt-child2 flex-r p-t-3">'+
                                        '<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">'+
                                            '<img class="icon-heart1 dis-block trans-04" src="/template/images/icons/icon-heart-01.png" alt="ICON">'+
                                            '<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/template/images/icons/icon-heart-02.png" alt="ICON">'+
                                        '</a>'+
                                    '</div>' +
                                '</div>'+
                            '</div>'+
                        '</div>';
            }
            html += "</div>";
                $("#itemLoadMore").append(html);
             $("#page").val(page);
        } else {
            $("#itemLoadMore").append("<h4 style = 'text-align: center'><b>" + result.message + "</b></h4>");
        }
      }
    });
}

function showMoreInfo(id)
{  
    $('.js-show-modal1').on('click',function(e){
        // e.preventDefault();
        $('.js-modal1').addClass('show-modal1');
    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });

    $.ajax({
        type : 'POST',
        dataType: 'JSON',
        data : {id},
        url: '/services/productmodal',
        success: function(result){
            if (result.error == false) {
                $("#modal_name").html(result.data.name);
                $("#modal_price").html(result.data.price + ' đ');
                $("#modal_price_sale").html(result.data.price_sale + " đ");
                $("#modal_content").html(result.data.content);
            }
        }
    });
    // $("#modal_name").html('tram');

}


function selectedProvince(id)
{
    $.ajax({
        'type' : 'POST',
        'dataType' : 'JSON',
        'data' : {id},
        'url' :'/services/getDistrict',
        success: function(result){
            var html = "";
            if (result.error == false) {
                for (let i in result.data) {
                    html += "<option onclick = 'selectedDistrict(" + result.data[i].id + ")' value='" + result.data[i]._prefix +' '+ result.data[i]._name + "'>" + result.data[i]._prefix + ": " + result.data[i]._name + "</option>";
                }
                $("#district").append(html);
        }
        }
    })
}

function selectedDistrict(idDistrict)
{
    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: { idDistrict },
      url: "/services/getWard",
      success: function(result) {
        var html = "";
        if (result.error == false) {
          for (let i in result.data) {
            html +=
              "<option  value='" + result.data[i]._prefix +' '+ result.data[i]._name + "'>" 
              + result.data[i]._prefix + ": " + result.data[i]._name + "</option>";
          }
          $("#ward").append(html);
        }
      }
    });
}


function login()
{
     $(".js-show-modal1").on("click", function(e) {
       // e.preventDefault();
       $(".js-modal1").addClass("show-modal1");
     });

     $(".js-hide-modal1").on("click", function() {
       $(".js-modal1").removeClass("show-modal1");
     });
    console.log('Vào');
}