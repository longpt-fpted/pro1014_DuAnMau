<?php
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
    include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php";

    $oldpassword = md5($_POST['old-pass']);
    $newpassword = md5($_POST['new-pass']);
    $id = $_POST['id'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);
    $pass = $user->getPassword();
    if($oldpassword == $pass){
        $userDAO->UserChangePassword($newpassword,$id);
        header("location: ../View/user.php?id=$id");
    }
    else {
        $userDAO->UserChangePassword($pass,$id);
        header("location: ../View/error404.php");

    }
    

?>