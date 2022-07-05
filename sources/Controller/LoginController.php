<?php
    include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";

    session_start();

    $username= isset($_POST['username']) ? $_POST['username'] : 'error';
    $password= isset($_POST['password']) ? $_POST['password'] : 'error';
    $method = isset($_POST['method']) ? $_POST['method'] : 'error';
    
    function login($username, $password) {
        $userDAO = new UserDAO();
        $resp = [];
        $user = $userDAO->isUsernameExist($username) ? $userDAO->getUserByUsername($username) : 'error';
        if($user !== 'error') {
            if($user->checkPassword($password)) {
                $_SESSION['user'] = $user->getID();
                $resp['status'] = 'success';
                $resp['redirect'] = 'index.php';
            } else {
                $resp['status'] = 'wrong-password';
                $resp['redirect'] = 'index.php';
            }
        } else {
            $resp['status'] = 'user-not-exist';
            $resp['redirect'] = 'index.php';
        }

        return $resp;
    }

    switch ($method) {
        case 'login':
            echo json_encode(login($username, $password));
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