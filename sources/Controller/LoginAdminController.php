<?php
    include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
    include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
    include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDAO.php";
    include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDetailDAO.php";

    // include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    // include "../Model/DAO/UserDAO.php";
    // include "../Model/DAO/OrderDAO.php";
    // include "../Model/DAO/OrderDetailDAO.php";
    session_start();

    $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : 'error';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : 'error';
    $method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';
    
    function login($username, $password) {
        $userDAO = new UserDAO();
        //$orderdetailDAO = new OrderDetailDAO();
        //$orderDAO = new OrderDAO();
        $resp = [];
        $user = $userDAO->isUsernameExist($username) ? $userDAO->getUserByUsername($username) : 'error';
        $role = $user->getRoleID();

        if($user !== 'error' and $role == 1) {
            if($user->checkPassword($password)) {
               
                $_SESSION['login'] = "ok";
                $resp['status'] = 'success';
            } else {
                $resp['status'] = 'wrong-password';
            }
        } else {
            $resp['status'] = 'user-not-exist';
        }

        return $resp;
    }

    function logout() {
        $resp = [];
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            unset($_SESSION['cart']);

            $resp['status'] = 'success';
        } else {
            $resp['status'] = 'failed';
        }

        return $resp;
    }
    switch ($method) {
        case 'login':
            echo json_encode(login($username, $password));
            break;
        case 'logout':
            echo json_encode(logout());
            break;
    }

    // $user = $userDAO->getUserByUsername($username);
    // $roleID = $user->getRoleID();
    // $cash = $user->getCurrency();

    // if($user->getPassword() != $password or $user->getUsername() != $username){
    //     echo ('<script>
    //                 var result = confirm("Wrong username or password!!");
    //                 if (result == true){
    //                     window.location= "../View/login.php";}
    //                 else window.location= "../View/login.php";
    //             </script>');
    // } else {
    //     if($user->getPassword() === $password and $roleID === 0)
    //     {
    //         $_SESSION['user'] = $username;
    //         $_SESSION['cash'] = $cash->getCurrency();
    //         $_SESSION['success'] = "Login Success!!";
    //         echo ('<script>
    //                 var result = confirm("Login Success!!");
    //                 if (result == true){
    //                     window.location= "../View/index.php";}
    //                 else window.location= "../View/index.php";
    //             </script>');
    //     }
    //     else return false;
    // }
?>