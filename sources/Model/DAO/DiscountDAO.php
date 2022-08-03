<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Discount.php";
class DiscountDAO {
    private $database;
    public function __construct() {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
    public function insertNewDiscountForUser($userID, $type) {
        if($this->database->connect_error) {
            return false;
        } else {
            if(!$this->isDiscountExist($userID, $type)) {
                $query = $this->database->prepare("INSERT INTO `discount`(`type`, `user_id`, `start_day`, `expired_day`) VALUES (?, ?, ?, ?)");
                $startDate = date("Y-m-d");
                $newDate = strtotime($startDate);
                $expireDate = date("Y-m-d", strtotime("+7 day", $newDate));
                $query->bind_param('ssss', $type, $userID, $startDate, $expireDate);
                
                return $query->execute();
            } else {
                $query = $this->database->prepare("UPDATE `discount` SET `quantity`= `quantity` + 1 WHERE `discount`.`user_id` = ? AND `discount`.`type` = ?");
                $query->bind_param('ss', $type, $userID);
                
                return $query->execute();
            }
        }
    }
    public function getAllUserDiscounts($userID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`discount`.`start_day`, '%d/%m/%Y') AS `fsdate`, DATE_FORMAT(`discount`.`expired_day`, '%d/%m/%Y') AS `fepdate` FROM `discount` WHERE `discount`.`user_id` = ?");
            $query->bind_param('s', $userID);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $discounts = [];
                    while($row = $result->fetch_assoc()) {
                        $discount = new Discount( $row['type'], $row['user_id'], $row['quantity'], $row['fsdate'], $row['fepdate']);
                        $discounts[] = $discount;
                    }
                    return $discounts;
                } else return [];
            } else return false;
        }
    }
    public function isDiscountExist($userID, $type) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`discount`.`start_day`, '%d/%m/%Y') AS `fsdate`, DATE_FORMAT(`discount`.`expired_day`, '%d/%m/%Y') AS `fepdate` FROM `discount` WHERE `discount`.`user_id` = ? AND `discount`.`type` = ?");
            $query->bind_param('ss', $userID, $type);
            if($query->execute()) {
                $result = $query->get_result();
                return $result->num_rows > 0;
            } else return false;
        }
    }
}
?>