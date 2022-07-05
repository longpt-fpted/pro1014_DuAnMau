<?php 
// include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/OrderDetail.php";

class OrderDetailDAO {
    private $database;
    public function __construct() {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }

    public function addOrderDetailToOrder($orderID, $productID, $quantity) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('INSERT INTO `orderdetail`(`order_id`, `product_id`, `quantity`, `price`) 
            SELECT ?, ?, ?, (`product`.`price` - (`product`.`price` * `product`.`sale_percent`)/100) * ?
            FROM `product` WHERE `product`.`id` = ?');

            $query->bind_param("sssss", $orderID, $productID, $quantity, $quantity, $productID);

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
                if($result->num_rows > 0) {
                    $orderdetails = [];
                    while($row = $result->fetch_assoc()) {
                        $orderdetail = new OrderDetail($row['order_id'], $row['product_id'], $row['quantity'], $row['price']);

                        $orderdetails[] = $orderdetail;
                    }
                    return $orderdetails;
                } else return false;
            } else return false;
        }
    }
}




?>