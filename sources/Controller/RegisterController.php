<?php
    // include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
    // include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php";

    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $email=$_POST['email'];

    $user = new User(null,null,$username,$password,$email,$fullname,null,0,null);
    $userDAO = new UserDAO();

    // $userDAO2 = new UserDAO();
    $checkuser = $userDAO->isUsernameExist($username);
    $checkemail = $userDAO->isEmailExist($email);
    
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