function deleteRow(id = 0, url = "") {
  if (confirm("Xóa và không thể khôi phục, bạn có chắc chắn?")) {
    $.ajax({
      type: "POST",
      dataType: "JSON",
      data: { id },
      url: "/admin/menus/delete",
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

