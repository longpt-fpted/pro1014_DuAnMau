<?php
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";

    include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
    include "/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php";

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $img_url = $_FILES['image']['name'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);
    $user->setFullname($fullname);
    $user->setPhone($phone);
    
    $dest = "/storage/ssd2/188/19378188/public_html/View/assets/userImg/".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $dest);
    if($_FILES['image']['name'] == ""){
        $userDAO->UserChangePhone($phone,$id);
        $userDAO->UserChangeFullname($fullname,$id);
    } else {
        $userDAO->UserChangeImg('./assets/userImg/'.$img_url,$id);
        $userDAO->UserChangePhone($phone,$id);
        $userDAO->UserChangeFullname($fullname,$id);
    }
   
    header("location: ../View/user.php?id=$id");
    

?>