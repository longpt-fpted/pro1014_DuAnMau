<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Mail.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
// include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";

    $username = $_POST['username'];
    $email = $_POST['email'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByEmail($email); // báo lỗi
    $password = $user->getPassword();
    $mail = new Mail();

     if($mail->sendMail($user->getEmail(), 'forgot your password ?', 'your password is '.$password))
        header("location: /sources/View/index.php");
?>