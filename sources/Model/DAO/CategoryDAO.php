<?php
// include '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Category.php';
// include "/XAMPP/htdocs/pro1014_duan/sources/Model/Category.php";
include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/Category.php";
 
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
    public function getCategoryByName($name) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `Category` WHERE `Category`.`name` = ?");
            $query->bind_param("s", $name);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $category = $result->fetch_assoc();
                    return new Category($category['id'], $category['name']);
                } else return false;
            } else return false;
        }
    }
    public function isCategoryExist($name) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `category` WHERE `category`.`name` = ?");
            $query->bind_param('s', $name);

            if($query->execute()) {
                $result = $query->get_result();
                return $result->num_rows > 0;
            } else return false;
        }
    }
    public function isCategoryExistWithID($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `category` WHERE `category`.`id` = ?");
            $query->bind_param('s', $id);

            if($query->execute()) {
                $result = $query->get_result();
                return $result->num_rows > 0;
            } else return false;
        }
    }
    public function insertNewCategory($name) {
        if($this->database->connect_error) {
            return false;
        } else {
            if(!$this->isCategoryExist($name)) {
                $query = $this->database->prepare("INSERT INTO `category`(`name`) VALUES (?)");
                $query->bind_param('s', $name);
    
                return $query->execute();
            } else return false;
        }
    }
    public function updateCategoryByID($id, $name) {
        if($this->database->connect_error) {
            return false;
        } else {
            if($this->isCategoryExistWithID($id)) {
                $query = $this->database->prepare("UPDATE `category` SET `category`.`name`= ? WHERE `category`.`id` = ?");
                $query->bind_param('ss', $name, $id);
    
                return $query->execute();
            } else return false;
        }
    }
}
?>