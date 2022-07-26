<?php
include '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Feedback.php';
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Utils.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";

// include "/xampp/htdocs/pro1014_DuAn/sources/Model/Feedback.php";
// include_once "/xampp/htdocs/pro1014_DuAn/sources/Utils/Utils.php";
// include_once "/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";

class FeedbackDAO {
    private $database;
    public function __construct()
    {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
    public function insertNewFeedback($userID, $productID, $rating, $text) {
        if($this->database->connect_error) {
            return false;
        } else {
            $utils = new Utils();
            $text = $utils->contentDecode($text);
            $date = date("Y-m-d");
            $query = $this->database->prepare("INSERT INTO `feedback`(`user_id`, `product_id`, `text`, `rating`, `date`) VALUES (?, ?, ?, ?, ?)");
            $query->bind_param("sssss", $userID, $productID, $text, $rating, $date);

            return $query->execute();
        }
    }   
    public function removeFeedbackByUserIDAndProductID($userID, $productID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("DELETE FROM `feedback` WHERE `feedback`.`user_id` = ? AND `feedback`.`product_id` = ?");
            $query->bind_param("ss", $userID, $productID);
            return $query->execute();
        }
    }
    public function getAllFeedBacksForProduct($productID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`feedback`.`date`, '%d/%l/%Y') AS `fdate`  FROM `feedback` WHERE `feedback`.`product_id` = ?");
            $query->bind_param("s", $productID);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $feedbacks = [];
                    while($row = $result->fetch_assoc()) {
                        $feedback = new Feedback($row['user_id'], $row['product_id'], $row['text'], $row['rating'], $row['fdate']);

                        $feedbacks[] = $feedback;
                    }
                    return $feedbacks;
                } else return false;
            } else return false;
        }
    }
    public function isFeedbackExist($userID, $productID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`feedback`.`date`, '%d/%l/%Y') AS `fdate` FROM `feedback` WHERE `feedback`.`product_id` = ? AND `feedback`.`user_id` = ?");
            $query->bind_param("ss", $productID, $userID);
            if($query->execute()) {
                $result = $query->get_result();
                return $result->num_rows > 0;
            } else return false;
        }
    }
    public function getProductFeedbackRate($productID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT ROUND(SUM(`feedback`.`rating`)/COUNT(feedback.rating)) as `total` FROM `feedback` WHERE `feedback`.`product_id` = ?");
            $query->bind_param("s", $productID);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $result = $result->fetch_assoc();
                    return $result['total'];
                }
            } else return false;
        }
    }
    public function getAllFeedbacks() {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`feedback`.`date`, '%d/%l/%Y') AS `fdate`  FROM `feedback`");
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $feedbacks = [];
                    while($row = $result->fetch_assoc()) {
                        $feedback = new Feedback($row['user_id'], $row['product_id'], $row['text'], $row['rating'], $row['fdate']);

                        $feedbacks[] = $feedback;
                    }
                    return $feedbacks;
                } else return false;
            } else return false;
        }
    }
}
?>