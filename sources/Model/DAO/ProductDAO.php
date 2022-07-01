<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";

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
            $query = $this->database->prepare('SELECT * FROM `Product` WHERE `Product`.`id` = ?');
            $query->bind_param('s', $id);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $product = $result->fetch_assoc();
                    return new Product($product['id'], $product['cate_id'], $product['name'], $product['price'], $product['sale_percent'], $product['rating'], $product['img_url'], $product['is_available']);
                } else return false;
            } else return false;
        }
    }
}
?>