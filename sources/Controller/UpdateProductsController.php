<?php
// include "C:\wamp64\www\hihihaha\pro1014_DuAn\sources\Model\DAO\UserDAO.php";

    include "/XAMPP/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
    include "/XAMPP/htdocs/pro1014_duan/sources/Utils/Database.php";
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img_url = $_POST['image'];
    $price = $_POST['price'];
    $sale_percent = $_POST['sale_percent'];
    $is_available = $_POST['is_available'];
    $cate_id = $_POST['category'];

    $productDAO = new ProductDAO();
    $product = $productDAO->getProductByID($id);
    
    $productDAO->updateProduct($name,$cate_id,$img_url,$price,$sale_percent,$is_available,$id);
    header('location: ../View/admin/products.php');


    /*if ($user->getID() == true){
        $user->setFullname($fullname);
        $user->setPassword($user->getPassword(),$password);
        $user->setPhone($phonenumber);
        header('location: ../View/admin/users.php');
    } else return false;*/
?>