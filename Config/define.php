<?php

include __DIR__.'/myDefine/product.php';
include __DIR__.'/myDefine/user.php';
#Config DIR Public
define('_PUBLIC_PATH_', $_SERVER['DOCUMENT_ROOT'] . 'public');

#content:
(!defined('__RESTOCK_MESSAGE_SUCCESS__'))   ? define('__RESTOCK_MESSAGE_SUCCESS__', 'Khôi phục thành công') : "";
(!defined('__UPDATE_SUCCESS__'))            ? define('__UPDATE_SUCCESS__',          'Cập nhật thành công') : "";
(!defined('__ADD_SUCCESS__'))               ? define('__ADD_SUCCESS__',             'Thêm mới thành công') : "";
(!defined('__DESTROY_SUCCESS__'))           ? define('__DESTROY_SUCCESS__',         'Xóa thành công') : '';
(!defined('__DESTROY_ERROR__'))             ? define('__DESTROY_ERROR__',           'Xóa thất bại') : '';
(!defined('__NOT_EXIST_ID__'))              ? define('__NOT_EXIST_ID__',            'ID không tồn tại') : "";
(!defined('__NOT_EXIST_IMAGE__'))           ? define('__NOT_EXIST_IMAGE__',         'Chưa nhận được hình ảnh, vui lòng chọn 1 ảnh!') : "";
(!defined('__NOT_EXIST_METHOD__'))          ? define('__NOT_EXIST_METHOD__',        'Phương thức không tồn tại') : "";
(!defined('__NOT_RECEIVED_DATA__'))         ? define('__NOT_RECEIVED_DATA__',       'Chưa nhận được dữ liệu, Vui lòng thử lại') : "";
(!defined('__UPDATE_ERROR__'))              ? define('__UPDATE_ERROR__',            'Cập nhật bị LỖI') : "";
(!defined('__ADD_ERROR__'))                 ? define('__ADD_ERROR__',               'LỖI thêm mới') : "";
(!defined('__DATA_ERROR__'))                ? define('__DATA_ERROR__',              'LỖI dữ liệu') : "";
(!defined('__ADD_POSITIVE_NUMBER__'))       ? define('__ADD_POSITIVE_NUMBER__',     'Vui lòng nhập số lớn hơn 0') : '';
(!defined('__IMAGE__'))                     ? define('__IMAGE__',                   'Hình ảnh') : '';
(!defined('__CATEGORY__'))                  ? define('__CATEGORY__',                'Danh mục') : '';
(!defined('__SIGN_IN__'))                   ? define('__SIGN_IN__',                  'Đăng ký') : '';
(!defined('__RETURN_HOME_PAGE__'))          ? define('__RETURN_HOME_PAGE__',         'Trở về trang chủ') : '';

#title page Admin:
(!defined('__ADD_PRODUCT_PAGE__'))          ? define('__ADD_PRODUCT_PAGE__',        'Thêm sản phẩm') : '';
(!defined('__LIST_PRODUCT_PAGE__'))         ? define('__LIST_PRODUCT_PAGE__',       'Danh sách sản phẩm') : '';
(!defined('__EDIT_PRODUCT_PAGE__'))         ? define('__EDIT_PRODUCT_PAGE__',       'Chỉnh sửa sản phẩm') : '';
(!defined('__TRASH_PRODUCT_PAGE__'))        ? define('__TRASH_PRODUCT_PAGE__',      'Thùng rác') : '';
(!defined('__SLIDE_PAGE__'))                ? define('__SLIDE_PAGE__',              'Quản lý slide') : '';

#frontend:
(!defined('__HOME_PAGE__'))             ? define('__HOME_PAGE__',               'Trang chủ') : '';
(!defined('__PRODUCT_PAGE__'))          ? define('__PRODUCT_PAGE__',            'Sản phẩm') : '';
(!defined('__CONTACT_PAGE__'))          ? define('__CONTACT_PAGE__',            'Liên hệ') : '';
(!defined('__ABOUT_PAGE__'))            ? define('__ABOUT_PAGE__',              'Giới thiệu') : '';
(!defined('__DETAIL_PRODUCT_PAGE__'))   ? define('__DETAIL_PRODUCT_PAGE__',     'Chi tiết sản phẩm') : '';

