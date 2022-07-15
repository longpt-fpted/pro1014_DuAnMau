<?php
    //include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
    //include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/UserDAO.php";
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";

    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email =    $_POST['email'];
    $phonenumber = $_POST['phone-number'];
    $role = $_POST['role'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);
    //var_dump($user);
    $userDAO->UpdateUser($fullname,$email,$phonenumber,$role,$id);
    //var_dump($userDAO);
    header('location: ../View/admin/users.php');


    /*if ($user->getID() == true){
        $user->setFullname($fullname);
        $user->setPassword($user->getPassword(),$password);
        $user->setPhone($phonenumber);
        header('location: ../View/admin/users.php');
    } else return false;*/
?>