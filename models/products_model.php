<?php

class Products_Model extends Base_Model{

    public function __construct(){

        parent::__construct();

    }

    public function addProduct($product){

        ksort($product);
        $columns = implode(',', array_keys($product));
        $values = ':' . implode(', :', array_keys($product));
        $stmt = $this->db->prepare("INSERT INTO products($columns) VALUES($values);");

        foreach($product as $key=>$value){

            $stmt->bindValue(":$key", $value);

        }

        $stmt->execute();
        return $this->db->lastInsertId();

    }

    public function getProducts(){

        return $this->db->query("SELECT id, name, brand, description, price, quantity, color, image_url, created_at, updated_at FROM products;")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deleteProduct($product) {

    $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");

    $stmt->bindValue(":id", $product['id']);

    $stmt->execute();

    return $stmt->rowCount();
    
    }

    public function deleteMultiple($ids) {
    if (is_array($ids)) {
        $idList = implode(',', array_map('intval', $ids));
        $query = "DELETE FROM products WHERE id IN ($idList)";
        $this->db->query($query);
    }
    }

public function getProductById($id)
{
    $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC); // Zwróć dane produktu jako tablicę asocjacyjną
}


    public function updateProduct($id, $data)
{
    $stmt = $this->db->prepare("UPDATE products SET name = :name, brand = :brand, price = :price, description = :description, quantity = :quantity, color = :color, image_url = :image_url WHERE id = :id");
    $stmt->bindParam(':name', $data['name']);
    $stmt->bindParam(':brand', $data['brand']);
    $stmt->bindParam(':price', $data['price']);
    $stmt->bindParam(':description', $data['description']);
    $stmt->bindParam(':quantity', $data['quantity']);
    $stmt->bindParam(':color', $data['color']);
    $stmt->bindParam(':image_url', $data['image_url']);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute(); // Zwraca true, jeśli aktualizacja się powiodła
}


public function getProductsByBrand() {
        $query = $this->db->prepare("SELECT brand, SUM(quantity) as total FROM products GROUP BY brand");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getKw1(){

        return $this->db->query("SELECT * FROM products WHERE price < 2000.00;")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getKw2(){

        return $this->db->query("SELECT * FROM products WHERE quantity < 20;")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getKw3(){

        return $this->db->query("SELECT * FROM products WHERE brand = 'NIKE';")->fetchAll(PDO::FETCH_ASSOC);

    }

}