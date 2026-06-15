<?php

class Sizes_Model extends Base_Model{

    public function __construct(){

        parent::__construct();

    }

    public function addSize($size){

        ksort($size);
        $columns = implode(',', array_keys($size));
        $values = ':' . implode(', :', array_keys($size));
        $stmt = $this->db->prepare("INSERT INTO sizes($columns) VALUES($values);");

        foreach($size as $key=>$value){

            $stmt->bindValue(":$key", $value);

        }

        $stmt->execute();
        return $this->db->lastInsertId();

    }

    public function getSizes(){

        return $this->db->query("SELECT id, size_value, size_system FROM sizes;")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deleteSize($size) {

    $stmt = $this->db->prepare("DELETE FROM sizes WHERE id = :id");

    $stmt->bindValue(":id", $size['id']);

    $stmt->execute();

    return $stmt->rowCount();
    
    }

    public function deleteMultiple($ids) {
    if (is_array($ids)) {
        $idList = implode(',', array_map('intval', $ids));
        $query = "DELETE FROM sizes WHERE id IN ($idList)";
        $this->db->query($query);
    }
    }


    public function getKw1(){

        return $this->db->query("SELECT * FROM sizes WHERE size_system = 'EUR';")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getKw2(){

        return $this->db->query("SELECT * FROM sizes WHERE size_system = 'US';")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getKw3(){

        return $this->db->query("SELECT * FROM sizes WHERE size_system = 'EUR' AND size_value < 40;")->fetchAll(PDO::FETCH_ASSOC);

    }


}