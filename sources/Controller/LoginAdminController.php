<?php
    session_start();
    include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/OrderDAO.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/OrderDetailDAO.php";
    

    $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : 'error';
    $password = md5(isset($_REQUEST['password']) ? $_REQUEST['password'] : 'error');
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
               
                $_SESSION['admin'] = "login";
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
        if(isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
            // unset($_SESSION['cart']);

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
?>