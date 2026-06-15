<?php

class Bootstrap{

    public function __construct(){

        session_start();  

        $url = $_GET['url'] ?? '';
        $url = explode("/", $url);


        if (!isset($_SESSION['user']) && ($url[0] !== 'login' || ($url[0] === 'login' && $url[1] !== 'validate'))) {
            require_once("controllers/login.php");
            (new Login())->get();
            return;
        }

        if(empty($url[0])) {
            require_once("controllers/home.php");
            (new Home())->get();
        }

        $file_name = "controllers/".$url[0].".php";

        /*
        if(!file_exists($file_name)){
            echo "Plik nie istnieje";
            return false;
        }
        */

        require_once($file_name);
        $ct_name = ucfirst($url[0]);
        $controller = new $ct_name;

        if(empty($url[1])){
            $controller->get();
            return false;
        }

        $action_name = isset($url[1]) ? $url[1] : NULL;

        if($action_name && method_exists($controller, $action_name)){
            if(empty($url[2])){
                $controller->{$url[1]}();
            }
            else{
                $controller->{$url[1]}($url[2]);
            }
        }
        else{
            echo "Operacja nie istnieje";
        }
    }
}
