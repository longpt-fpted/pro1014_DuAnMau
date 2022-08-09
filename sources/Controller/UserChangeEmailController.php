<?php
    include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php";

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