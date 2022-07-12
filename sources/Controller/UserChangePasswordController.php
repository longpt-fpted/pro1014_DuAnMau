<?php
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/UserDAO.php";
    $oldpassword = $_POST['old-pass'];
    $newpassword = $_POST['new-pass'];

    $userDAO = new UserDAO();
    $userID = isset($_GET['id']) ? $_GET['id'] : 1;
    $user = $userDAO->getUserByID($userID);
    $id = $user->getID();
    $user->setPassword($oldpassword,$newpassword);
    
    $userDAO->UserChangePassword($newpassword,$id);
    //var_dump($user);
    //var_dump($id);
    header("location: ../View/user.php");
    

?>