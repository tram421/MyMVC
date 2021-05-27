<?php

namespace Core;

class Helper
{
  public static function makeSafe($data = '')
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return addslashes($data);
    }

    public static function decodeSafe($data = '')
    {
        $data = htmlspecialchars_decode($data);
        return stripslashes($data);
    }

  public static function redirect($url = '/')
  {
    header('Location: '. $url);
  }
  public static function timeStamp()
  {
    return date("Y-m-d H:i:s");
  }
}
