<?php 

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../Config/Bridge.php";

use Core\App;
use Firebase\JWT\JWT;



// $key = "example_key";
// $payload = array(
//     "iss" => "http://example.org",
//     "aud" => "http://example.com",
//     "iat" => 1356999524,
//     "nbf" => 1357000000
// );

// $jwt = JWT::encode($payload, $key);

// $decoded = JWT::decode($jwt, $key, array('HS256'));
// dd($decoded);

$app = new App;
