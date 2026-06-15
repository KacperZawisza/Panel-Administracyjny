<?php

class Home_Model extends Base_Model{

    public $db;

    public function __construct(){

        parent::__construct();

    }

    public function getKw1(){

        return $this->db->query("SELECT * FROM products WHERE price > 2000.00;")->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getKw2(){

        return $this->db->query("SELECT * FROM products WHERE brand = 'AIR JORDAN';")->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getKw3(){

        return $this->db->query("SELECT * FROM users WHERE role = 'user';")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function GetReport($data) {
    try {
        // Pobranie zapytania z klucza 'ask'
        $query = $data['ask'];

        // Przygotowanie zapytania
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        // Pobranie wyników jako tablica asocjacyjna
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Obsługa błędów
        return ['error' => $e->getMessage()];
    }
}


public function getProductsCount() {
    return (int) $this->db->query("SELECT COUNT(*) as count FROM products")->fetch(PDO::FETCH_ASSOC)['count'];
}

public function getUsersCount() {
    return (int) $this->db->query("SELECT COUNT(*) as count FROM users")->fetch(PDO::FETCH_ASSOC)['count'];
}

public function getBrandsCount() {
    return (int) $this->db->query("SELECT COUNT(DISTINCT brand) as count FROM products")->fetch(PDO::FETCH_ASSOC)['count'];
}


   


}