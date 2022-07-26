<?php
// include '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Product.php';
// include "/XAMPP/htdocs/pro1014_duan/sources/Model/Product.php";
include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/Product.php";
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
    public function UpdateProduct($name,$cate_id,$img_url,$price,$sale_percent,$is_available,$sell_count,$rating,$view,$id){
        if($this->database->connect_error){
            return false;
        }else {
            $query = $this->database->prepare("UPDATE `product` SET `name`=?,`cate_id`=?,`img_url`=?, `price`=?, `sale_percent`=?, `is_available`=?, `sell_count`=?, `rating`=?, `view`=? WHERE `product`.`id`=?");
            $query->bind_param("ssssssssss",$name,$cate_id,$img_url,$price,$sale_percent,$is_available,$sell_count,$rating,$view,$id);
            if($query->execute()){
                return true;
            }
            else return false;
        }
    }
    public function UpdateProductWithoutImage($name,$cate_id,$price,$sale_percent,$is_available,$sell_count,$rating,$view,$id){
        if($this->database->connect_error){
            return false;
        }else {
            $query = $this->database->prepare("UPDATE `product` SET `name`=?,`cate_id`=?, `price`=?, `sale_percent`=?, `is_available`=?, `sell_count`=?, `rating`=?, `view`=? WHERE `product`.`id`=?");
            $query->bind_param("sssssssss",$name,$cate_id,$price,$sale_percent,$is_available,$sell_count,$rating,$view,$id);
            if($query->execute()){
                return true;
            }
            else return false;
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
    public function getAllProductsWithoutAvailable() {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `Product`');
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
    public function getProductsByName($keyword){
        if($this->database->connect_error){
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 AND `name` LIKE '%".$keyword."%'");
            
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
    public function getProductsByKeywords($cate, $min, $max, $keyword) {
        if($this->database->connect_error){
            return false;
        } else {
            if($cate == '-1') {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = `product`.`cate_id` and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `name` ASC;");
                $query->bind_param('ss', $min, $max);
            } else {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = ? and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `name` ASC");
                $query->bind_param('sss', $cate, $min, $max);
            }
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
    public function getNewestProductsForSearch($cate, $min, $max, $keyword) {
        if($this->database->connect_error){
            return false;
        } else {
            if($cate == '-1') {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = `product`.`cate_id` and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`id` DESC;");
                $query->bind_param('ss', $min, $max);
            } else {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = ? and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`id` DESC;");
                $query->bind_param('sss', $cate, $min, $max);
            }
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
    public function getHotProductsForSearch($cate, $min, $max, $keyword) {
        if($this->database->connect_error){
            return false;
        } else {
            if($cate == '-1') {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = `product`.`cate_id` and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`rating` DESC;");
                $query->bind_param('ss', $min, $max);
            } else {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = ? and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`rating` DESC;");
                $query->bind_param('sss', $cate, $min, $max);
            }
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
    public function getSaleProductsForSearch($cate, $min, $max, $keyword) {
        if($this->database->connect_error){
            return false;
        } else {
            if($cate == '-1') {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = `product`.`cate_id` and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`sale_percent` DESC;");
                $query->bind_param('ss', $min, $max);
            } else {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = ? and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`sale_percent` DESC;");
                $query->bind_param('sss', $cate, $min, $max);
            }
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
    public function getProductsForSearchWithPriceIncrease($cate, $min, $max, $keyword) {
        if($this->database->connect_error){
            return false;
        } else {
            if($cate == '-1') {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = `product`.`cate_id` and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`price` ASC;");
                $query->bind_param('ss', $min, $max);
            } else {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = ? and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`price` ASC;");
                $query->bind_param('sss', $cate, $min, $max);
            }
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
    public function getProductsForSearchWithPriceDecrease($cate, $min, $max, $keyword) {
        if($this->database->connect_error){
            return false;
        } else {
            if($cate == '-1') {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = `product`.`cate_id` and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`price` DESC;");
                $query->bind_param('ss', $min, $max);
            } else {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = ? and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`price` DESC;");
                $query->bind_param('sss', $cate, $min, $max);
            }
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
    public function getProductsForSearchWithNameIncrease($cate, $min, $max, $keyword) {
        if($this->database->connect_error){
            return false;
        } else {
            if($cate == '-1') {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = `product`.`cate_id` and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`name` ASC;");
                $query->bind_param('ss', $min, $max);
            } else {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = ? and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`name` ASC;");
                $query->bind_param('sss', $cate, $min, $max);
            }
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
    public function getProductsForSearchWithNameDecrease($cate, $min, $max, $keyword) {
        if($this->database->connect_error){
            return false;
        } else {
            if($cate == '-1') {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = `product`.`cate_id` and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`name` DESC;");
                $query->bind_param('ss', $min, $max);
            } else {
                $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`is_available`= 1 and `product`.`cate_id` = ? and (`product`.`price` BETWEEN ? and ?) AND `name` LIKE '%".$keyword."%' ORDER BY `product`.`name` DESC;");
                $query->bind_param('sss', $cate, $min, $max);
            }
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
    public function getHotProducts($limit) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `product` WHERE `product`.`is_available` = 1 order by `product`.`view` desc, `product`.`sell_count` desc limit ?;');
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
    public function updateProductSell($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('UPDATE `product` SET `sell_count`=`sell_count` + 1 WHERE `product`.`id` = ? AND `product`.`is_available` = 1');
            $query->bind_param('s', $id);
            return $query->execute();
        }
    }
    public function isProductExist($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `product` WHERE `product`.`id` = ?");
            $query->bind_param('s', $id);

            if($query->execute()) {
                $result = $query->get_result();
                return $result->num_rows > 0;
            } else return false;
        }
    }
    public function isGameExist($name) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `product` WHERE `product`.`name` = ?');
            $query->bind_param("s", $name);

            if($query->execute()) {
                $result = $query->get_result();
                return $result->num_rows > 0;
            } else return false;
        }
    }
    public function addProduct($name,$img_url,$cate_id,$price,$sale_percent) {
        if($this->database->connect_error){
            return false;
        } else {
            $query = $this->database->prepare('INSERT INTO `product`(`name`, `img_url`, `cate_id`, `price`,`sale_percent`) VALUES (?,?,?,?,?)');
            $query->bind_param("sssss",$name,$img_url,$cate_id,$price,$sale_percent);
            if($query->execute()){
                return true;
            }
            else return false;
        }
    }
    public function insertNewProduct($product) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("INSERT INTO `product`(`cate_id`, `name`, `price`, `sale_percent`, `rating`, `img_url`, `view`, `sell_count`, `is_available`) VALUES (?, ?, ?, ?, 0, ?, 0, 0, 1)");
            $cate = $product->getCateID();
            $name = $product->getName();
            $price = $product->getPrice();
            $sale = $product->getSale();
            $img = $product->getImg();

            $query->bind_param('sssss', $cate, $name, $price, $sale, $img);
            return $query->execute();
        }
    }
    public function deleteProductByID($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('UPDATE `product` SET `is_available` = 0 WHERE `product`.`id` = ? AND `product`.`is_available` = 1');
            $query->bind_param('s', $id);
            return $query->execute();
        }  
    }
}
?>