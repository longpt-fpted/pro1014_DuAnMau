<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require '../sources/Libraries/PHPMailer/src/Exception.php';
//require '../sources/Libraries/PHPMailer/src/PHPMailer.php';
//require '../sources/Libraries/PHPMailer/src/SMTP.php';
require 'C:\xampp\htdocs\pro1014_DuAn\sources\Libraries\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\pro1014_DuAn\sources\Libraries\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\pro1014_DuAn\sources\Libraries\PHPMailer\src\SMTP.php';


include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
include "../Model/DAO/UserDAO.php";

    $username = $_POST['username'];
    $email = $_POST['email'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByEmail($email);
    $password = $user->getPassword();

$mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tuannm280699@gmail.com';
        $mail->Password = '2806Tuan';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 465;// 587
        
        $mail->setFrom('tuannm280699@gmail.com', 'System');
        $mail->addAddress($email, 'Pham Thien Long');
        $mail->isHTML(true);
        $mail->Subject = 'Forgot your password?';
        $mail->Body = "This is your account password: $password";
        $mail->send();
        echo 'Message has been sent';
    } catch(Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    header("locaiton: /sources/View/index.php")
?>