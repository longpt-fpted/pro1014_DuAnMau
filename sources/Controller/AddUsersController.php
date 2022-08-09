<?php
include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php";
//  include "/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/UserDAO.php";
//  include "/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $phonenumber = $_POST['phone-number'];
    $role = $_POST['role'];

    $userDAO = new UserDAO();


    $checkuser = $userDAO->isUsernameExist($username);
    $checkemail = $userDAO->isEmailExist($email);
    $checkphone = $userDAO->isPhonenumberExist($phonenumber);
    
    echo($checkuser);
    if ($checkuser == 1) {
        echo ('<script>
                var result = confirm("Username already existed!!");
                if (result == true){
                window.location= "../View/admin/users.php";}
                else window.location= "../View/admin/users.php";
            </script>');
    } else if ($checkemail == 1){
        echo ('<script>
                var result = confirm("Email already used!!");
                if (result == true){
                window.location= "../View/admin/users.php";}
                else window.location= "../View/admin/users.php";
            </script>');
    } else if ($checkphone == 1){
        echo ('<script>
                var result = confirm("Phone number already used!!");
                if (result == true){
                window.location= "../View/admin/users.php";}
                else window.location= "../View/admin/users.php";
            </script>');
    } 
     else {
            $user = $userDAO->addUserAdmin($role,$username,$password,$email,$fullname,$phonenumber);
            if ( $user == true){
                echo ('<script>
                            var result = confirm("Register Success!!");
                            if (result == true){
                                window.location= "../View/admin/users.php";}
                            else window.location= "../View/admin/users.php";
                        </script>');
            } else return false;
        }
        
?>