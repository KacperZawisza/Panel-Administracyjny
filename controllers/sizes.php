<?php

class Sizes extends Base_Controller{
    public function __construct(){

        parent::__construct();
        $this->loadModel("sizes");

    }

    public function add(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->addSize($_POST);

        }

        $this->view->render('sizes/add');

    }

    public function get($id=null){

        $this->view->size_data = $this->model->getSizes();
        $this->view->skw1_data = $this->model->getKw1();
        $this->view->skw2_data = $this->model->getKw2();
        $this->view->skw3_data = $this->model->getKw3();
        $this->view->render('sizes/get');

    }

    public function delete(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->deleteSize($_POST);

        }

        $this->view->render('sizes/delete');

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