<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
    // include "../Utils/Database.php";
    // include "../Model/DAO/UserDAO.php";

    $oldpassword = $_POST['old-pass'];
    $newpassword = $_POST['new-pass'];
    $id = $_POST['id'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);
    $pass = $user->getPassword();
    if($oldpassword == $pass){
        $userDAO->UserChangePassword($newpassword,$id);
    }
    else {
        $userDAO->UserChangePassword($pass,$id);
    }
    header("location: ../View/user.php?id=$id");
    

?>