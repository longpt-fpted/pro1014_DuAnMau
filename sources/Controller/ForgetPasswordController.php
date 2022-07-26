<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Mail.php";

// require '../sources/Libraries/PHPMailer/src/Exception.php';
// require '../sources/Libraries/PHPMailer/src/PHPMailer.php';
// require '../sources/Libraries/PHPMailer/src/SMTP.php';
// require '/xampp/htdocs/pro1014_DuAn/sources/Libraries/PHPMailer/src/Exception.php';
// require '/xampp/htdocs/pro1014_DuAn/sources/Libraries/PHPMailer/src/PHPMailer.php';
// require '/xampp/htdocs/pro1014_DuAn/sources/Libraries/PHPMailer/src/SMTP.php';


// include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";

    $username = $_POST['username'];
    $email = $_POST['email'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByEmail($email);
    $password = $user->getPassword();
    $mail = new Mail();

     if($mail->sendMail('longptps19740@fpt.edu.vn', 'forgot your password ?', 'your password is'.$password))
        header("locaiton: /sources/View/index.php");
?>