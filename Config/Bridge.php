<?php session_start();ob_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');

define("__VIEW__", __DIR__.'/../App/Views');

$config = [
    "Route", 'Function', 'DB'
];

foreach ($config as $config) {
    include $config . ".php";
}