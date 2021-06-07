<?php

#define with variable
if (!function_exists('ADD_TO_TRASH_SUCCESS')) 
{
    function ADD_TO_TRASH_SUCCESS($productName = '')
    {        
        return 'Đã chuyển sản phẩm: "<b>' . $productName . '</b>" vào thùng rác.';
    }
}

(!defined('__PRICESALE_SMALL_THAN_PRICE__'))    ? define('__PRICESALE_SMALL_THAN_PRICE__',  'Giá sale phải nhỏ hơn giá gốc') : '';
(!defined('__ADD_PRICE_PLEASE__'))              ? define('__ADD_PRICE_PLEASE__',            'Vui lòng nhập giá gốc') : '';
(!defined('__NAME_DESCRIPTION_IMAGE_NULL__'))   ? define('__NAME_DESCRIPTION_IMAGE_NULL__', 'Tên, chi tiết sản phẩm và hình ảnh không được trống') : '';
