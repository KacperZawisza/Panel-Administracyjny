<?php

class Cart_Model extends Base_Model{

    public function __construct(){

        parent::__construct();

    }

    public function addCart($cart){

        ksort($cart);
        $columns = implode(',', array_keys($cart));
        $values = ':' . implode(', :', array_keys($cart));
        $stmt = $this->db->prepare("INSERT INTO cart($columns) VALUES($values);");

        foreach($cart as $key=>$value){

            $stmt->bindValue(":$key", $value);

        }

        $stmt->execute();
        return $this->db->lastInsertId();

    }

    public function getCart(){

        return $this->db->query("SELECT user_id, product_id, quantity, size FROM cart;")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deleteCart($cart) {

    $stmt = $this->db->prepare("DELETE FROM cart WHERE id = :id");

    $stmt->bindValue(":id", $cart['id']);

    $stmt->execute();

    return $stmt->rowCount();
    
    }

}