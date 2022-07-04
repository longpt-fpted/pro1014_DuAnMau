<?php

//include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "C:\wamp64\www\hihihaha\pro1014_duan\sources\Utils\Database.php";
include "C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\User.php";
//include '../User.php';

class UserDAO {
    private $database; 
    public function __construct() {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }

    public function getUserByID($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT * FROM `User` WHERE `User`.`id` = ?");
            $query->bind_param('s', $id);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    return new User($user['id'], $user['username'], $user['password'], $user['email'], $user['fullname'], $user['phone_number'], $user['currency'], $user['role_id']);
                } else return false;
            } else return false;
        }
    }
    public function getUserByEmail($email) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `User` WHERE `User`.`email` = ?');
            $query->bind_param('s', $email);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    return new User($user['id'], $user['username'], $user['password'], $user['email'], $user['fullname'], $user['phone_number'], $user['currency'], $user['role_id']);
                } else return false;
            } else return false;
        }
    }
    public function getUserByUsername($username) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `User` WHERE `User`.`username` = ?');
            $query->bind_param('s', $username);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    return new User($user['id'], $user['username'], $user['password'], $user['email'], $user['fullname'], $user['phone_number'], $user['currency'], $user['role_id']);
                } else return false;
            } else return false;
        }
    }
    public function getAllUsers() {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `User`');
            if($query->execute()) {
                $users = [];
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $user = new User($row['id'], $row['username'], $row['password'], $row['email'], $row['fullname'], $row['phone_number'], $row['currency'], $row['role_id']);
                        $users[] = $user;
                    }
                    return $users;
                } else return false;
            } else return false;
        }
    }
    public function addUser() {
        if($this->database->connect_error){
            return false;
        } else {
            $query = $this->database->prepare("INSERT into `User` VALUES 'null','null','$user->getUsername()','$user->getPassword()','$user->getEmail()','$user->getFullname()','null'");
            if($query->execute()){
                return true;
            }
            else return false;
        }
    }
}
?>