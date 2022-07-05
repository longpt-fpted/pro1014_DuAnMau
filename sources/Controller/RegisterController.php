<?php
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/DAO/UserDAO.php";
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/User.php";

    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\DAO\UserDAO.php');
    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\User.php');
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $user = new User(null,null,$username,$password,$email,$fullname,null,0);
    
    $userDAO = new UserDAO();
    //$userDAO->addUser($user->getUsername(),$user->getPassword(),$user->getEmail(),$user->getFullname());
    $check = $userDAO->addUser($username,$password,$email,$fullname);
    echo ("$username,$password,$email,$fullname");
    //var_dump($userDAO -> addUser($user));
    if ( $check == true){
        echo ("Success");
        echo ('<script>
                    var result = confirm("Register Success!!");
                    if (result == true){
                        window.location= "../View/login.php";}
                    else window.location= "../View/index.php";
                </script>');
    } else return false;
?>