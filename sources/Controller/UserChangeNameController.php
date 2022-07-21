<?php
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/UserDAO.php";

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $userDAO = new UserDAO();
    $userID = isset($_GET['id']) ? $_GET['id'] : 1;
    $user = $userDAO->getUserByID($userID);
    $id = $user->getID();
    $user->setFullname($fullname);
    $user->setPhone($phone);

    $img_url = $_FILES['image']['name'];
    $dest = "/xampp/htdocs/pro1014_DuAn/sources/View/assets/userImg/".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $dest);
    if($_FILES['image']['name'] == ""){
        $userDAO->UserChangePhone($phone,$id);
        $userDAO->UserChangeFullname($fullname,$id);
    } else {
        $userDAO->UserChangeImg();
        $userDAO->UserChangePhone($phone,$id);
        $userDAO->UserChangeFullname($fullname,$id);
    }
   
    //var_dump($user);
    //var_dump($id);
    header("location: ../View/user.php");
    

?>