<?php

class Products extends Base_Controller{
    public function __construct(){

        parent::__construct();
        $this->loadModel("products");

    }

    public function add(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->addProduct($_POST);

        }

        $this->view->render('products/add');

    }

    public function get($id=null){

        $this->view->product_data = $this->model->getProducts();
        $this->view->pkw1_data = $this->model->getKw1();
        $this->view->pkw2_data = $this->model->getKw2();
        $this->view->pkw3_data = $this->model->getKw3();
        $this->view->render('products/get');

    }
    
    public function delete(){

        if(isset($_POST['submit'])){

            unset($_POST['submit']);
            $this->view->id = $this->model->deleteProduct($_POST);

        }

        $this->view->render('products/delete');

    }

    public function bulk_delete() {
    if (isset($_POST['selected_ids'])) {
        $selected_ids = $_POST['selected_ids'];
        $this->model->deleteMultiple($selected_ids);
    }
    // Po operacji możesz przekierować użytkownika lub wyświetlić odpowiedni komunikat
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

     public function edit($id)
{
    // Pobierz dane użytkownika z modelu
    $product_data = $this->model->getProductById($id);

    // Sprawdź, czy dane zostały prawidłowo pobrane
    

    // Załaduj widok formularza edycji i przekaż dane użytkownika
    $this->view->product = $product_data;
    $this->view->render('products/edit');
}

public function update()
{
    // Pobierz dane z formularza
    $id = $_POST['id'];
    $data = [
        'name' => $_POST['name'],
        'brand' => $_POST['brand'],
        'price' => $_POST['price'],
        'description' => $_POST['description'],
        'quantity' => $_POST['quantity'],
        'color' => $_POST['color'],
        'image_url' => $_POST['image_url'],
    ];

    // Zaktualizuj dane produktu w modelu
    if ($this->model->updateProduct($id, $data)) {
        // Przekierowanie na stronę listy produktów po udanej aktualizacji
        header('Location: http://localhost/PracowniaProjektowaniaStronInternetowych/PanelTest/products');
        exit;
    } else {
        // Obsłuż błąd
        echo 'Błąd aktualizacji produktu';
    }

}

public function getProductsChartData() {
        $data = $this->model->getProductsByBrand();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

}

?>