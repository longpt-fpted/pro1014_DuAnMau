<?php
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
//include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Category.php";
//include "C:\wamp64\www\hihihaha\pro1014_DuAn\sources\Utils\Database.php";
include "C:\wamp64\www\hihihaha\pro1014_DuAn\sources\Model\Category.php";
class CategoryDAO {
    private $database;
    public function __construct() {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
    public function getCategoryByID($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `Category` WHERE `Category`.`id` = ?");
            $query->bind_param("s", $id);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $category = $result->fetch_assoc();
                    return new Category($category['id'], $category['name']);
                } else return false;
            } else return false;
        }
    }
    public function getAllCategories() {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `Category`");
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $cates = [];
                    while($row = $result->fetch_assoc()) {
                        $cate = new Category($row['id'], $row['name']);

                        $cates[] = $cate;
                    }
                    return $cates;
                }
            }
        }
    }
}
?>