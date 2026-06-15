<?php

class Login extends Base_Controller {

    public function __construct() {
        parent::__construct();
        
        require_once 'models/users_model.php';
        $this->model = new Users_Model();
    }

    public function get() {
        $error = ''; 
        require_once 'views/layout/login.php';
    }

    public function validate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                $error = 'Oba pola są wymagane.';
                require_once 'views/layout/login.php';
                return;
            }

            $user = $this->model->findUserByEmailAndPassword($email, $password);

            if ($user) {
                
                if ($user['role'] == 'admin' || $user['role'] == 'user') {
                    session_start();
                    $_SESSION['user'] = $user;
                    header("Location: " . BASE_URL);
                    exit;
                } else {
                
                    $error = 'Brak uprawnień administracyjnych.';
                    require_once 'views/layout/login.php';
                    return;
                
                }
                
            } else {
                $error = 'Nieprawidłowy e-mail lub hasło.';
                require_once 'views/layout/login.php';
                return;
            }
        }
    }
}
