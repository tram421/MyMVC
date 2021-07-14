<?php session_start();ob_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');

define("__VIEW__", __DIR__.'/../App/Views');
define("__TIME_COOKIE__", 86400);
define("__TOKEN", '1E5C9BE6BA15A635FBEE94EF7AC34');


$config = [
    "Route", 'Function', 'DB', 'define'
];

foreach ($config as $config) {
    include $config . ".php";
}