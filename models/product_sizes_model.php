<?php

class Product_sizes_Model extends Base_Model{

    public function __construct(){

        parent::__construct();

    }

    public function addProduct_sizes($product_size){

        ksort($product_size);
        $columns = implode(',', array_keys($product_size));
        $values = ':' . implode(', :', array_keys($product_size));
        $stmt = $this->db->prepare("INSERT INTO product_sizes($columns) VALUES($values);");

        foreach($product_size as $key=>$value){

            $stmt->bindValue(":$key", $value);

        }

        $stmt->execute();
        return $this->db->lastInsertId();

    }

    public function getProduct_sizes(){

        return $this->db->query("SELECT id, product_id, size_id, size_system FROM product_sizes;")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deleteProduct_sizes($product_size) {

    $stmt = $this->db->prepare("DELETE FROM product_sizes WHERE id = :id");

    $stmt->bindValue(":id", $product_size['id']);

    $stmt->execute();

    return $stmt->rowCount();
    
    }

    public function deleteMultiple($ids) {
    if (is_array($ids)) {
        $idList = implode(',', array_map('intval', $ids));
        $query = "DELETE FROM product_sizes WHERE id IN ($idList)";
        $this->db->query($query);
    }
    }

}