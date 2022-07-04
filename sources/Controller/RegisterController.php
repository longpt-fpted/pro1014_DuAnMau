<?php
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/DAO/UserDAO.php";
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/User.php";

    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\DAO\UserDAO.php');
    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\User.php');

    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $user = new User(null,null,$username,$password,$email,$fullname,null,null);
    var_dump($user);
    /*$userDAO = new UserDAO();
    $userDAO -> addUser($user);
    if ($userDAO -> addUser($user) == true ){
        echo ('<script>
                    var result = confirm("Register Success!!");
                    if (result == true){
                        window.location= "../View/login.php";}
                    else window.location= "../View/login.php";
                </script>');
    } else return false;*/
?>