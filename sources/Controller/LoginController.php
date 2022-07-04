<?php
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/DAO/UserDAO.php";
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/User.php";

    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\DAO\UserDAO.php');
    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\User.php');
    $username=$_POST['username'];
    $password=$_POST['password'];

    $userDAO = new UserDAO();
    $user = new User();
    var_dump($user->getUserByUsername($username));
    $user->getPassword();
        
?>