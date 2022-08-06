<?php
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Comment.php";
// include_once "C:/Xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
// include "../Model/Comment.php";
class CommentDAO {
    private $database;
    public function __construct()
    {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
    public function insertNewComment($comment) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("INSERT INTO `comment`( `user_id`, `product_id`, `text`, `parent_id`, `date`) VALUES (?, ?, ?, ?, ?)");
            $userID = $comment->getUserID();
            $productID = $comment->getProductID();
            $text = $comment->getText();
            $parent = $comment->getParentID();
            $date = date("Y-m-d");

            $query->bind_param('sssss', $userID, $productID, $text, $parent, $date);

            return $query->execute();
        }
    }
    public function removeCommentByID($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("DELETE FROM `comment` WHERE `comment`.`id` = ?");
            $query->bind_param('s', $id);

            return $query->execute();
        }
    }
    public function getAllCommentsForProduct($productID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`comment`.`date`, '%d/%m/%Y') AS `fdate` FROM `comment` WHERE `comment`.`product_id` = ? AND `comment`.`parent_id` = 0");
            $query->bind_param('s', $productID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $comments = [];
                    while($row = $result->fetch_assoc()) {
                        $comment = new Comment($row['id'], $row['user_id'], $row['product_id'], $row['text'], $row['parent_id'], $row['fdate']);

                        $comments[] = $comment;
                    }
                    return $comments;
                } else return false;
            } else return false;
        }
    }
    public function getReplyCommentsByParentAndProduct($productID, $parentID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`comment`.`date`, '%d/%m/%Y') AS `fdate` FROM `comment` WHERE `comment`.`product_id` = ? AND `comment`.`parent_id` = ?");
            $query->bind_param('ss', $productID, $parentID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $comments = [];
                    while($row = $result->fetch_assoc()) {
                        $comment = new Comment($row['id'], $row['user_id'], $row['product_id'], $row['text'], $row['parent_id'], $row['fdate']);

                        $comments[] = $comment;
                    }
                    return $comments;
                } else return false;
            } else return false;
        }
    }
    public function getReplyCommentByID($commentID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`comment`.`date`, '%d/%m/%Y') AS `fdate` FROM `comment` WHERE `comment`.`id` = ?");
            $query->bind_param('s', $commentID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $comment = $result->fetch_assoc();
                    return new Comment($comment['id'], $comment['user_id'], $comment['product_id'], $comment['text'], $comment['parent_id'], $comment['fdate']);
                } else return false;
            } else return false;
        }
    }
    public function getNewestReplyComment($userID, $productID, $parentID) {
        // ; 
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`comment`.`date`, '%d/%m/%Y') AS `fdate` FROM `comment` WHERE `comment`.`user_id` = ? AND `comment`.`product_id` = ? AND `comment`.`parent_id` = ? ORDER BY `comment`.`id` DESC");
            $query->bind_param('sss', $userID, $productID, $parentID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $comment = $result->fetch_assoc();
                    return new Comment($comment['id'], $comment['user_id'], $comment['product_id'], $comment['text'], $comment['parent_id'], $comment['fdate']);
                } else return false;
            } else return false;
        }
    }
}
?>