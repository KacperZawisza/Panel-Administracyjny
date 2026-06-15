<?php

ini_set('display_errors', 0);
require_once("config.php");

function my_autoloader($class) {
    include 'lib/' . $class . '.php';
}

spl_autoload_register('my_autoloader');

$app = new Bootstrap();

?>