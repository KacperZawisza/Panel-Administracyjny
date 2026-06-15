<?php

class Product_sizes extends Base_Controller{
    public function __construct(){

        parent::__construct();
        $this->loadModel("product_sizes");

    }

    public function add(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->addProduct_sizes($_POST);

        }

        $this->view->render('product_sizes/add');

    }

    public function get($id=null){

        $this->view->product_size_data = $this->model->getProduct_sizes();
        $this->view->render('product_sizes/get');

    }
    
    public function delete(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->deleteProduct_sizes($_POST);

        }

        $this->view->render('product_sizes/delete');

    }

    public function bulk_delete() {
    if (isset($_POST['selected_ids'])) {
        $selected_ids = $_POST['selected_ids'];
        $this->model->deleteMultiple($selected_ids);
    }
    // Po operacji możesz przekierować użytkownika lub wyświetlić odpowiedni komunikat
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}

?>