<?php
namespace App\Helpers;

class Validate
{
    public static function validate_phone($phoneInput)
    {
        
        if (strlen($phoneInput) > 11 || strlen($phoneInput) < 10) {            
            return [
                'error' => true,
                'message' => "Số điện thoại có chiều dài không đúng"
            ];
        }
        if (preg_match("#[a-zA-Z]+#",$phoneInput)) {
            return [
                'error' => true,
                'message' => "Số điện thoại không được chứa kí tự"
            ];
        }            
        if (preg_match('/[\!\'^£$%&*()}{@#~?><>,|=_+¬-]/', $phoneInput))
        {
            return [
                'error' => true,
                'message' => "Số điện thoại phải không chứa ký tự đặc biệt"
            ];
        }
        if (!preg_match("/^0/", $phoneInput))
        {
            return [
                'error' => true,
                'message' => "Số điện thoại phải bắt đầu bằng số 0"
            ];
        }

        return [
                'error' => false,
                'message' => "Invalid"
            ];
    }
/**
 * function validate at least 6 character
 * description: this function validate the password have at least 6 character and have at least 1 [a-zA-Z] and number
 * result: array include error and message: [error => true/false, message => '']
 */
    public static function validate_password($passInput)
    {
        if (strlen($passInput) < 6) {
            return [
                'error' => true,
                'message' => "Mật khẩu phải có số kí tự lớn hơn 6"
            ];
        } 
        if(!preg_match("#[0-9]+#",$passInput)) {
            return [
                'error' => true,
                'message' => "Mật khẩu phải có ít nhất một số từ 0-9"
            ];
        }
        if(!preg_match("#[a-zA-Z]+#",$passInput)) {
            return [
                'error' => true,
                'message' => "Mật khẩu phải có ít nhất một chữ cái từ a-z A-Z"
            ];
        }
        return [
                'error' => false,
                'message' => "Invalid"
            ];
    }
}