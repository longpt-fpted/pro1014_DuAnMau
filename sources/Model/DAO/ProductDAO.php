<?php
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Product.php";

class ProductDAO {
    private $database;
    public function __construct()
    {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
    public function getProductByID($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `Product` WHERE `Product`.`id` = ? AND `product`.`is_available` = 1');
            $query->bind_param('s', $id);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $product = $result->fetch_assoc();
                    return new Product($product['id'], $product['cate_id'], $product['name'], $product['price'], $product['sale_percent'], $product['rating'], $product['img_url'], $product['view'], $product['sell_count'], $product['is_available']);
                } else return false;
            } else return false;
        }
    }
    public function getSaleProductsWithLimit($limit) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`sale_percent` > 0 and `product`.`is_available` = 1 ORDER BY `product`.`sale_percent` desc limit ?");
            $query->bind_param('s', $limit);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $products = [];
                    while($row = $result->fetch_assoc()) {
                        $product = new Product($row['id'], $row['cate_id'], $row['name'], $row['price'], $row['sale_percent'], $row['rating'], $row['img_url'], $row['view'], $row['sell_count'], $row['is_available']);

                        $products[] = $product;
                    }
                    return $products;
                } else return false;
            } else return false;
        }
    }
    public function updateProductView($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('UPDATE `product` SET `view`=`view` + 1 WHERE `product`.`id` = ? AND `product`.`is_available` = 1');
            $query->bind_param('s', $id);
            return $query->execute();
        }
    }
    public function getNewProducts($limit) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available` = 1 ORDER BY `product`.`id` desc limit ?");
            $query->bind_param('s', $limit);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $products = [];
                    while($row = $result->fetch_assoc()) {
                        $product = new Product($row['id'], $row['cate_id'], $row['name'], $row['price'], $row['sale_percent'], $row['rating'], $row['img_url'], $row['view'], $row['sell_count'], $row['is_available']);

                        $products[] = $product;
                    }
                    return $products;
                } else return false;
            } else return false;
        }
    }
    public function getAllProducts() {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `Product` Where `Product`.`is_available` = 1');
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $products = [];
                    while($row = $result->fetch_assoc()) {
                        $product = new Product($row['id'], $row['cate_id'], $row['name'], $row['price'], $row['sale_percent'], $row['rating'], $row['img_url'], $row['view'], $row['sell_count'], $row['is_available']);

                        $products[] = $product;
                    }
                    return $products;
                } else return false;
            } else return false;
        }
    }
}
?>