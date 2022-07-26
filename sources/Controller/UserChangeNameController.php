<?php
    include "../Utils/Database.php";
    include "../Model/DAO/UserDAO.php";

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $img_url = $_FILES['user-avatar']['name'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);
    $user->setFullname($fullname);
    $user->setPhone($phone);
    
    $dest = "/xampp/htdocs/pro1014_DuAn/sources/View/assets/userImg/".$_FILES['user-avatar']['name'];
    move_uploaded_file($_FILES['user-avatar']['tmp_name'], $dest);
    if($_FILES['user-avatar']['name'] == ""){
        $userDAO->UserChangePhone($phone,$id);
        $userDAO->UserChangeFullname($fullname,$id);
    } else {
        $userDAO->UserChangeImg('./assets/userImg/'.$img_url,$id);
        $userDAO->UserChangePhone($phone,$id);
        $userDAO->UserChangeFullname($fullname,$id);
    }
   
    //var_dump($user);
    //var_dump($id);
    header("location: ../View/user.php?id=$id");
    

?>