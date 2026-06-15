<?php

class Cart extends Base_Controller{
    public function __construct(){

        parent::__construct();
        $this->loadModel("cart");

    }

    public function add(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->addCart($_POST);

        }

        $this->view->render('cart/add');

    }

    public function get($id=null){

        $this->view->cart_data = $this->model->getCart();
        $this->view->render('cart/get');

    }

    public function delete(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->deleteCart($_POST);

        }

        $this->view->render('cart/delete');

    }
    
}

?>