<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Order.php";
// include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/Order.php";

class OrderDAO {
    private $database;
    public function __construct()
    {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
    public function getOrderByID($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT `order`.`id`, `order`.`user_id`, `order`.`price`, `order`.`is_pay`, DATE_FORMAT(`order`.`date`, '%d/%m/%Y') AS 'date' FROM `order` WHERE `order`.`id` = ?");
            $query->bind_param('s', $id);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $order = $result->fetch_assoc();
                    return new Order($order['id'], $order['user_id'], $order['price'], $order['is_pay'], $order['date']);
                } else return false;
            } else return false;
        }
    }
    public function getUnpayOrderByUserID($userID) {
        if($this->database->connect_error) {
            return false;
        } else {
            if(!$this->isExistUnpayOrder($userID)) {
                $date = date("Y-m-d");
                $this->createOrderForUserID($userID, $date);
            }
            $query = $this->database->prepare("SELECT * FROM `order` WHERE `order`.`user_id` = ? and `order`.`is_pay` = 0");
            $query->bind_param('s', $userID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $order = $result->fetch_assoc();
                    return new Order($order['id'], $order['user_id'], $order['price'], $order['is_pay'], $order['date']);
                } else return false;
            } else return false;
        }
    }
    public function updateOrderToPayByUserID($userID, $price, $date) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("UPDATE `order` SET `price`= ?, `is_pay`= 1, `date`= ? WHERE `order`.`user_id` = ? and `order`.`is_pay` = 0;");
            $query->bind_param('sss', $price, $date, $userID);

            return $query->execute();
        }
    }
    
    public function isExistUnpayOrder($userID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `order` WHERE `order`.`user_id` = ? and `order`.`is_pay` = 0");
            $query->bind_param('s', $userID);

            if($query->execute()) {
                $result = $query->get_result();
                return $result->num_rows > 0;
            } else return false;
        }
    }
    public function createOrderForUserID($userID, $date) {
        if($this->database->connect_error) {
            return false;
        } else {
            if($this->isExistUnpayOrder($userID)) {
                return false;
            } else {
                $query = $this->database->prepare("INSERT INTO `order`(`user_id`, `price`, `is_pay`, `date`) VALUES (?, 0, 0, ?)");
                $query->bind_param("ss", $userID, $date);
    
                return $query->execute();
            }
        }
    }
    public function getAllPayedOrderByUserID($userID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT `order`.`id`, `order`.`user_id`, `order`.`price`, `order`.`is_pay`, DATE_FORMAT(`order`.`date`, '%d/%m/%Y') AS 'date' FROM `order` WHERE `order`.`user_id` = ? and `order`.`is_pay` = 1 ORDER BY date ASC");
            $query->bind_param('s', $userID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $orders = [];
                    while($row = $result->fetch_assoc()) {
                        $order = new Order($row['id'], $row['user_id'], $row['price'], $row['is_pay'], $row['date']);
                        $orders[] = $order;
                    }
                    return $orders;
                } else return false;
            } else return false;
        }
    }
}
?>