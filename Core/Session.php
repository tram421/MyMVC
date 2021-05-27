<?php
namespace Core;

class Session
{
    public static function addFlash($key = '', $mess = '')
    {
        return $_SESSION[$key] = $mess;
    }
    public static function removeFlash($key = '')
    {
        unset($_SESSION[$key]);
        return true;
    }
}