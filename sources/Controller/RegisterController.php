<?php
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/DAO/UserDAO.php";
    // include "/wamp64/www/hihihaha/pro1014_duan/sources/Model/User.php";

    include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\DAO\UserDAO.php');
    //include ('C:\wamp64\www\hihihaha\pro1014_duan\sources\Model\User.php');

    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $user = new User(null,null,$username,$password,$email,$fullname,null,0,null);
    $userDAO = new UserDAO();

    $userDAO2 = new UserDAO();
    $checkuser = $userDAO2->isUsernameExist($username);
    $checkemail = $userDAO2->isEmailExist($email);
    
    echo($checkuser);
    if ($checkuser == 1) {
        echo ('<script>
                var result = confirm("Username already existed!!");
                if (result == true){
                window.location= "../View/register.php";}
                else window.location= "../View/register.php";
            </script>');
    } else if ($checkemail == 1){
        echo ('<script>
                var result = confirm("Email already used!!");
                if (result == true){
                window.location= "../View/register.php";}
                else window.location= "../View/register.php";
            </script>');
    } else {
        $check = $userDAO->addUser($username,$password,$email,$fullname);
        if ( $check == true){
            echo ("Success");
            echo ('<script>
                        var result = confirm("Register Success!!");
                        if (result == true){
                            window.location= "../View/login.php";}
                        else window.location= "../View/index.php";
                    </script>');
        } else return false;
    }
        
    
    //$userDAO->addUser($user->getUsername(),$user->getPassword(),$user->getEmail(),$user->getFullname());
    //var_dump($userDAO -> addUser($user));
    /*    if ( $check == true){
            echo ("Success");
            echo ('<script>
                        var result = confirm("Register Success!!");
                        if (result == true){
                            window.location= "../View/login.php";}
                        else window.location= "../View/index.php";
                    </script>');
        } else return false;
    }*/
?>