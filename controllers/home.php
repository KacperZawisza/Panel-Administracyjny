<?php

class Home extends Base_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->loadModel("home");
    }

    public function get($id = null) {
        // Ładowanie standardowych danych
        $this->loadDefaultQueries();
        $this->view->render('layout/dashboard');
    }

    public function CustomReport() {
        if (isset($_POST['submit'])) {
            unset($_POST['submit']);

            // Pobranie raportu z modelu
            $report = $this->model->GetReport($_POST);

            // Przekazanie danych do widoku
            if (isset($report['error'])) {
                $this->view->report_error = $report['error'];
                $this->view->report_data = [];
            } else {
                $this->view->report_data = $report;
            }

            // Zawsze ładujemy standardowe dane
            $this->loadDefaultQueries();

            // Renderowanie widoku
            $this->view->render('layout/dashboard');
        }
    }

    private function loadDefaultQueries() {
        $this->view->kw1_data = $this->model->getKw1();
        $this->view->kw2_data = $this->model->getKw2();
        $this->view->kw3_data = $this->model->getKw3();
    }

    public function getStats() {
    $stats = [
        'products_count' => $this->model->getProductsCount(),
        'users_count' => $this->model->getUsersCount(),
        'brands_count' => $this->model->getBrandsCount()
    ];

    // Debug: wyświetl JSON w przeglądarce
    header('Content-Type: application/json');
    echo json_encode($stats, JSON_PRETTY_PRINT); // Lepszy format do debugowania
    exit;
}



}
