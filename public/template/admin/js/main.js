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


