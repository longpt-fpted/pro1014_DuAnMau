<?php
//include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Order.php";
include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/Order.php";

class OrderDAO {
    private $database;
    public function __construct()
    {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
    public function getUnpayOrderByUserID($userID) {
        if($this->database->connect_error) {
            return false;
        } else {
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
    public function createOrderByUserID($userID) {
        if($this->database->connect_error) {
            return false;
        } else {
            if($this->isExistUnpayOrder($userID)) {
                return false;
            } else {
                $query = $this->database->prepare("INSERT INTO `order`(`user_id`) VALUES ?");
                $query->bind_param('s', $userID);

                return $query->execute();
            }
        }
    }

}
?>