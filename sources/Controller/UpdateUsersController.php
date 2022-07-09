<?php
include "C:\wamp64\www\hihihaha\pro1014_DuAn\sources\Model\DAO\UserDAO.php";

    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email =    $_POST['email'];
    $phonenumber = $_POST['phone-number'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);
    
    $userDAO->UpdateUser($fullname,$email,$phonenumber,$id);
    header('location: ../View/admin/users.php');


    /*if ($user->getID() == true){
        $user->setFullname($fullname);
        $user->setPassword($user->getPassword(),$password);
        $user->setPhone($phonenumber);
        header('location: ../View/admin/users.php');
    } else return false;*/
?>