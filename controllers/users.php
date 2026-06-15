<?php

class Users extends Base_Controller{
    public function __construct(){

        parent::__construct();
        $this->loadModel("users");

    }

    public function add(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->addUser($_POST);

        }

        $this->view->render('users/add');

    }

    public function get($id=null){

        $this->view->user_data = $this->model->getUsers();
        $this->view->ukw1_data = $this->model->getKw1();
        $this->view->ukw2_data = $this->model->getKw2();
        $this->view->ukw3_data = $this->model->getKw3();
        $this->view->render('users/get');

    }

    public function delete(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->deleteUser($_POST);

        }

        $this->view->render('users/delete');

    }

    public function bulk_delete() {
    if (isset($_POST['selected_ids'])) {
        $selected_ids = $_POST['selected_ids'];
        $this->model->deleteMultiple($selected_ids);
    }

    header('Location: ' . BASE_URL . 'users');
    }


    public function edit($id)
{
    $user_data = $this->model->getUserById($id);
    
    $this->view->user = $user_data;
    $this->view->render('users/edit');
}


    public function update()
{
    $id = $_POST['id'];
    echo $id;
    $data = [
        'name_surname' => $_POST['name_surname'],
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'password' => $_POST['password'] 
    ];

    // Wywołanie metody z modelu do aktualizacji
    $this->model->updateUser($id, $data);
    header('Location: ' . BASE_URL . 'users');

}

public function save_roles()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['roles'])) {
        $roles = $_POST['roles']; 
        foreach ($roles as $id => $role) {

            $this->model->updateRole($id, $role);
        }

        header('Location: ' . BASE_URL . 'users');
        exit;
    }
}


    
}

?>