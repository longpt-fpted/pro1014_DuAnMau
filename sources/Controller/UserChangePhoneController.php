<?php
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/UserDAO.php";


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