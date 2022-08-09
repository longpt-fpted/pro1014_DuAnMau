<?php
include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
include "/storage/ssd2/188/19378188/public_html/Utils/Mail.php";
include "/storage/ssd2/188/19378188/public_html/Utils/Utils.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/FeedbackDAO.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $utils = new Utils();


    $userDAO = new UserDAO();
    $user = $userDAO->getUserByEmail($email);
    $password = $utils->generateRandomString();
    $userDAO->UserChangePassword(md5($password), $user->getID());
    $mail = new Mail();

     if($mail->sendMail($user->getEmail(), 'Forgot your password ?', 'Your password is '.$password))
        header("location: ../View");
?>