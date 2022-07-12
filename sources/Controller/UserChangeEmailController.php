<?php
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/UserDAO.php";

    $email = $_POST['mail'];

    $userDAO = new UserDAO();
    $userID = isset($_GET['id']) ? $_GET['id'] : 1;
    $user = $userDAO->getUserByID($userID);
    $id = $user->getID();
    $user->setEmail($email);
    
    $userDAO->UserChangeEmail($email,$id);
    var_dump($user);
    var_dump($id);
    header("location: ../View/user.php");
    

?>