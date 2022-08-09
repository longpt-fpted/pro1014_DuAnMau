<?php
    include "../Utils/Database.php";
    // include "/Model/DAO/UserDAO.php";
    // include "/Model/DAO/OrderDAO.php";
    // include "/Model/DAO/OrderDetailDAO.php";

    // include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/OrderDAO.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/OrderDetailDAO.php";
    session_start();

    $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : 'error';
    $password = md5(isset($_REQUEST['password']) ? $_REQUEST['password'] : 'error');
    $method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';
    
    function login($username, $password) {
        $userDAO = new UserDAO();
        $orderdetailDAO = new OrderDetailDAO();
        $orderDAO = new OrderDAO();
        $resp = [];
        $user = $userDAO->isUsernameExist($username) ? $userDAO->getUserByUsername($username) : 'error';
        if($user !== 'error') {
            if($user->checkPassword($password)) {
                $_SESSION['user'] = $user->getID();
                $order = $orderDAO->getUnpayOrderByUserID($user->getID());
                if(isset($_SESSION['cart'])) {
                    
                    foreach ($_SESSION['cart'] as $orderdetail) {
                        $isContain = $orderdetailDAO->isOrderdetailContained($user->getID(), $order->getID(), $orderdetail['id']);
                        if($isContain) {
                            $od = $orderdetailDAO->getOrderDetailByUserIDAndOrderID($user->getID(), $order->getID());
                            $orderdetailDAO->addOrderDetailToOrder($order->getID(), $orderdetail['id'], $od->getQuantity() + $orderdetail['quantity'], $isContain);
                        } else {
                            $orderdetailDAO->addOrderDetailToOrder($order->getID(), $orderdetail['id'], $orderdetail['quantity'], $isContain);
                        }
                    }
                }
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