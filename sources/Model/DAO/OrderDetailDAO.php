<?php 
//include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/OrderDetail.php";
include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/OrderDetail.php";
class OrderDetailDAO {
    private $database;
    public function __construct() {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }

    public function addOrderDetailToOrder($orderID, $productID, $quantity, $isContain) {
        if($this->database->connect_error) {
            return false;
        } else {
            if($isContain == false) {
                $query = $this->database->prepare('INSERT INTO `orderdetail`(`order_id`, `product_id`, `quantity`, `price`) 
                SELECT ?, ?, ?, (`product`.`price` - (`product`.`price` * `product`.`sale_percent`)/100) * ?
                FROM `product` WHERE `product`.`id` = ?');
    
                $query->bind_param("sssss", $orderID, $productID, $quantity, $quantity, $productID);
    
                return $query->execute();
            } else {
                $query = $this->database->prepare('UPDATE `orderdetail` JOIN `product` on `product`.`id` = `orderdetail`.`product_id` SET `quantity`= ?, `orderdetail`.`price` = (`product`.`price` - (`product`.`price` * `product`.`sale_percent`)/ 100) * (?) WHERE `orderdetail`.`order_id` = ? AND `product`.`id` = ?');

                $query->bind_param("ssss", $quantity, $quantity, $orderID, $productID);

                return $query->execute();
            }
        }
    }
    public function minusOrderDetailFromOrder($orderID, $productID, $quantity) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("UPDATE `orderdetail` JOIN `product` on `product`.`id` = `orderdetail`.`product_id` SET `quantity`= ?, `orderdetail`.`price` = (`product`.`price` - (`product`.`price` * `product`.`sale_percent`)/ 100) * (?) WHERE `orderdetail`.`order_id` = ? AND `product`.`id` = ?");

            $query->bind_param("ssss", $quantity, $quantity, $orderID, $productID);

            return $query->execute();
        }
    }
    public function getAllOrderDetailByUserIdAndOrderID($userID, $orderID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT `orderdetail`.`order_id`, `orderdetail`.`product_id`, `orderdetail`.`quantity`, `orderdetail`.`price`
            FROM `orderdetail` JOIN `order` ON `order`.`id` = `orderdetail`.`order_id` WHERE `orderdetail`.`order_id` = ? AND `order`.`user_id` = ?");
            $query->bind_param('ss', $orderID, $userID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows >= 0) {
                    $orderdetails = [];
                    while($row = $result->fetch_assoc()) {
                        $orderdetail = new OrderDetail($row['order_id'], $row['product_id'], $row['price'], $row['quantity']);

                        $orderdetails[] = $orderdetail;
                    }
                    return $orderdetails;
                } else return false;
            } else return false;
        }
    }
    public function getOrderDetailByUserIDAndOrderID($userID, $orderID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT `orderdetail`.`order_id`, `orderdetail`.`product_id`, `orderdetail`.`quantity`, `orderdetail`.`price`
            FROM `orderdetail` JOIN `order` ON `order`.`id` = `orderdetail`.`order_id` WHERE `orderdetail`.`order_id` = ? AND `order`.`user_id` = ?");
            $query->bind_param('ss', $orderID, $userID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                        $orderdetail = $result->fetch_assoc();
                        return new OrderDetail($orderdetail['order_id'], $orderdetail['product_id'], $orderdetail['price'], $orderdetail['quantity']);
                } else return false;
            } else return false;
        }
    }
    public function isOrderdetailContained($userID, $orderID, $productID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT `orderdetail`.`order_id`, `orderdetail`.`product_id`, `orderdetail`.`quantity`, `orderdetail`.`price` FROM `orderdetail` JOIN `order` ON `order`.`id` = `orderdetail`.`order_id` WHERE `orderdetail`.`order_id` = ? AND `order`.`user_id` = ? AND `orderdetail`.`product_id` = ?; ");
            $query->bind_param("sss", $orderID, $userID, $productID);

            if($query->execute()) {
                $result = $query->get_result();
                return $result->num_rows > 0;
            } else return false;
        }
    }
    public function removerOrderDetailByProductIDAndOrderID($productID, $orderID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("DELETE FROM `orderdetail` WHERE `orderdetail`.`product_id` = ? and `orderdetail`.`order_id` = ?");
            $query->bind_param('ss', $productID, $orderID);

            return $query->execute();
        }
    }
    public function getAllOrderDetailPayedByUserIdAndOrderID($userID, $orderID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT `orderdetail`.`order_id`, `orderdetail`.`product_id`, `orderdetail`.`quantity`, `orderdetail`.`price`
            FROM `orderdetail` JOIN `order` ON `order`.`id` = `orderdetail`.`order_id` WHERE `orderdetail`.`order_id` = ? AND `order`.`user_id` = ? AND `order`.`is_pay` = 1");
            $query->bind_param('ss', $orderID, $userID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $orderdetails = [];
                    while($row = $result->fetch_assoc()) {
                        $orderdetail = new OrderDetail($row['order_id'], $row['product_id'], $row['price'], $row['quantity']);

                        $orderdetails[] = $orderdetail;
                    }
                    return $orderdetails;
                } else return false;
            } else return false;
        }
    }
}




?>