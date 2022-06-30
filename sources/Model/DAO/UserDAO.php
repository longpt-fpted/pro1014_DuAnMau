<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include '../User.php';

class UserDAO {
    private $database;
    public function __construct() {
    }

    public function getUserByID($id) {
        $database = new Database();
        $database = $database->getDatabase();
        if($database->connect_error) {
            return false;
        } else {
            $query = $database->prepare("SELECT * FROM `User` WHERE `User`.`id` = ?");
            $query->bind_param('s', $id);

            if($query->execute()) {
                
                // return true;
            } else return false;
        }
    }
}

$dao = new UserDAO();
var_dump($dao->getUserByID(1));
?>