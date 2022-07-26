<?php
    include "../Utils/Database.php";
    include "../Model/DAO/UserDAO.php";

    $oldpassword = $_POST['old-pass'];
    $newpassword = $_POST['new-pass'];
    $id = $_POST['id'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);
    $pass = $user->getPassword();
    if($oldpass = $pass){
        $userDAO->UserChangePassword($newpassword,$id);
    }
    else {
        $userDAO->UserChangePassword($pass,$id);
    }
    //var_dump($user);
    //var_dump($pass);
    header("location: ../View/user.php?id=$id");
    

?>