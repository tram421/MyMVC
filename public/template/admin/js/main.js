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
// if (confirm("Lỗi! " + ' Nhấn ok để vẫn tải lên')) {}
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
            if (result.error == true) {
              $("#thumb1").append("<p></p><span style = 'color : red'>Error: </span>");
            }
            if (result.message == 'File ảnh đã tồn tại') {
              $("#thumb1").append("<span style = 'color : green'>This image already exist, so can't upload to folder, but you can use it to your slide</span>");
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




