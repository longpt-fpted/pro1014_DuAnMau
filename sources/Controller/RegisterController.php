<?php
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/DAO/UserDAO.php";
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/User.php";

    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\DAO\UserDAO.php');
    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\User.php');
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $userDAO = new UserDAO();
    /*$user = $userDAO->getUserByUsername($username);
    if($user->getUsername() != $username){
        $user->addUser();
    }*/
    $user = new User();
    $userDAO -> addUser($user);
    if ($userDAO -> addUser($user))
?>