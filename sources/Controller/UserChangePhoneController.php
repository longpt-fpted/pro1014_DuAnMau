<?php
    include "../Utils/Database.php";
    include "../Model/DAO/UserDAO.php";

    // include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    // include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/UserDAO.php";
    include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
    include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";

    $phone = $_POST['phone'];
    $id = $_POST['id'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);
    
    $user->setPhone($phone);
    
    $userDAO->UserChangePhone($phone,$id);
    //var_dump($userID);
    //var_dump($id);
    header("location: ../View/user.php?id=$id");
    

?>