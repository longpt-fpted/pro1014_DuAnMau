<?php
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/DAO/UserDAO.php";
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/User.php";

    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\DAO\UserDAO.php');
    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\User.php');
    $username=$_POST['username'];
    $password=$_POST['password'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByUsername($username);
    $id = $userDAO->getUserByUsername($username);
    $cash = $userDAO->getUserByUsername($username);
    //var_dump($id->getRoleID($username));
    //var_dump($user->getPassword($username));
    //var_dump($cash->getCurrency());
    if($user->getPassword() != $password or $user->getUsername() != $username){
        echo ('<script>
                    var result = confirm("Wrong username or password!!");
                    if (result == true){
                        window.location= "../View/login.php";}
                    else window.location= "../View/login.php";
                </script>');

    } else {
        if($user->getPassword() === $password and $id->getRoleID()===0)
        {
            /*session_start();
            $_SESSION['user'] = $username;
            $_SESSION['cash'] = $cash->getCurrency();
            $_SESSION['success'] = "Login Success!!";*/
            echo ('<script>
                    var result = confirm("Login Success!!");
                    if (result == true){
                        window.location= "../View/index.php";}
                    else window.location= "../View/index.php";
                </script>');
        }
        else return false;
    }
?>