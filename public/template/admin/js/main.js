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
              if (confirm("Lỗi! " + result.message + ". Nhấn ok để vẫn tải lên, nhấn cancel để lấy ảnh đã tồn tại.")) {
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
                const html = '<a href="/' + result.url + '" target="_blank"><img src="/' + result.url + '" width="100px"></a>';
                $("#thumb").html(html);
                $("#url_file").val("/" + result.url);
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
        if (result.mess != 'success') {
          location.reload(); 
        } else {
          location.reload();
          
        }  
              
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
  if (confirm('Bạn có chắc chắn về phí ship của đơn hàng này không?')) {
    let value = $("#shipcost-" + id).val();
    let cost = $("#cost-" + id).val();
    value = parseInt(value);
    cost = parseInt(cost);

    if (isNaN(value) == true) {
      alert("Vui lòng nhập số");
    } else {
      var total = cost + value;
      $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "/admin/order/storeShipCost",
        data: { id, value, total },
        success: function(result) {
          if (result == "success") {
            location.reload();
          }
        }
      });
    }
  }
  
 
  // value = parseInt(value);
  // console.log(value);
}

function setState(state = '', id = 0, ship = 0)
{
  // console.log(state);
  if(ship == 0 && state == 'confirmed') {
    return alert("Không thể xác nhận đơn hàng khi chưa có phí ship");
  }
  if(confirm("Bạn có chắc chắn muốn thay đổi trạng thái đơn hàng này không?")) {
    $.ajax({
      type: "POST",
      dataType: "JSON",
      url: "/admin/order/setState",
      data: { state, id },
      success: function(result) {
        if(result == state) {
          location.reload();
        }
      }
    });
  }
  
}
function deleteOrder(id = 0)
{
  if (confirm('Bạn có chắc muốn xóa đơn hàng này?')) {
    $.ajax({
      type: "POST",
      dataType: "JSON",
      url: "/admin/order/delete",
      data: { id },
      success: function(result) {
        if (result == "success") {
          location.reload();
        }
      }
    });
  }
   
}

function logOut(id = 0)
{
//  console.log("tram");
  if(confirm('Bạn có chắc muốn đăng xuất?')) {
    $.ajax({
      type: 'POST',
      typeData: 'JSON',
      url:'/admin/logOut',
      success: function(result){
        if(result.error == false) {
          location.reload();
        }
      }
    });
  }
}


// function changeInfo(name = '', idAtt = '', id = 0)
// {
//    $("#" + idAtt).removeAttr("onclick");
//     $("#" + idAtt).html('<input onkeyup="myKeyUp('+idAtt+'-'+id+')" value="' + name + '" onblur="save(\'' + idAtt + "', " + id + ')" name="' + idAtt + '" id = "' + idAtt + "-" + id + '">');
// }
// function myKeyUp(id = '') {
//   $val = $('#'+id).val();
//   console.log($val);
  // $('#' + id).value($val);
// }
// function save(idAtt = '', id = 0) 
// {
  // $value = $("#" + idAtt + "-" + id).val();
  // $.ajax({
  //   type: "POST",
  //   typeData: "JSON",
  //   url: "/admin/user/updateUser",
  //   data: { $value, idAtt, id },
  //   success: function(result) {
  //     if (result.error == false) {
  //       alert("Cập nhật thông tin thành công");
  //     }
  //   }
  // });
// }


function showPic($url = "") {
  $("#ekkoLightbox-567").removeClass("down");
  $("#ekkoLightbox-567").removeClass("hide");
  $("#ekkoLightbox-567").addClass("show");
  $("#ekkoLightbox-567").addClass("up");
  $(".ekko-lightbox-item").addClass("show");
  $("#modal-album").attr('src', $url);
  $("#nameFile").html($url);
  console.log('nhấn');
}
$('.close').click(function(){
  $("#ekkoLightbox-567").removeClass("up");
  $("#ekkoLightbox-567").removeClass("show");
  $("#ekkoLightbox-567").addClass("hide");
  $("#ekkoLightbox-567").addClass("down");
  $(".ekko-lightbox-item").removeClass('show');
});
// $("#ekkoLightbox-567").click(function(e) {
//   e.stopPropagation();
// });
function addImageToProduct()
{
  console.log('vào');
  $.ajax({
    type: "POST",
    typeData: "JSON",
    url: "/admin/album/list/addProduct",
    success: function(result) {
      
      html =
        '<div id="ekkoLightbox-567" class="ekko-lightbox modal fade in show up" tabindex="-1" role="dialog" aria-modal="true"' +
              'style="padding-right: 16px; display: block; ">' +
            '<div class="modal-dialog" role="document" style="display: block; flex: 1 1 1px; max-width: 80%; max-height: 80%; overflow: scroll;">' +
              '<div class="modal-content">' +
                '<div class="modal-header">' +
                    '<h4 class="modal-title" id="nameFile">Bộ sưu tập</h4>' +
                    '<button type="button" class="close" data-dismiss="modal"' +
                        ' aria-label="Close" onclick="closeAlbum()"><span aria-hidden="true">×</span></button>' +
                  '</div>'+
                  '<div class="row">' ;
                  for (let x in result) {
        html += '<div class="m-2 border p-2">'+
                '<a style="cursor:pointer" data-toggle="lightbox" data-title="sample 1 - white" onclick="selectImage(\''+result[x]+'\')">'+
                    '<img src="'+result[x]+'" class="img-fluid" alt="white sample"'+
                        'style="width: 200px; height: 200px">'+
                '</a>'+
            '</div>';
                  }

        html += '<div class="modal-footer hide" style="display: none;">&nbsp;</div>' + "</div>" + "</div>" + "</div>" + "</div>";

      $("#album-modal").html(html);
    }
  });
  
}
function selectImage(url = '')
{
   $("#ekkoLightbox-567").removeClass("up");
   $("#ekkoLightbox-567").removeClass("show");
   $("#ekkoLightbox-567").addClass("hide");
   $("#ekkoLightbox-567").addClass("down");
   $(".ekko-lightbox-item").removeClass("show");
   const html = '<img src="' + url + '" width="100px">';
   $("#thumb").html(html);
   $("#url_file").val( url);
}
function closeAlbum()
{
  $("#ekkoLightbox-567").removeClass("up");
  $("#ekkoLightbox-567").removeClass("show");
  $("#ekkoLightbox-567").addClass("hide");
  $("#ekkoLightbox-567").addClass("down");
  $(".ekko-lightbox-item").removeClass("show");
}

