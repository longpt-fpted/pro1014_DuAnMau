<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
    // include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    // include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/UserDAO.php";

    $email = $_POST['mail'];

    $userDAO = new UserDAO();
    $id = $_POST['id'];
    $user = $userDAO->getUserByID($id);
    $user->setEmail($email);
    
    $userDAO->UserChangeEmail($email,$id);
    //var_dump($user);
    //var_dump($id);
    header("location: ../View/user.php?id=$id");
    

?>