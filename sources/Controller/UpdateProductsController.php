<?php
// include "C:\wamp64\www\hihihaha\pro1014_DuAn\sources\Model\DAO\UserDAO.php";

    include "../Model/DAO/ProductDAO.php";
    include "../Utils/Database.php";

    // include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
    // include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img_url = $_FILES['image']['name'];
    $price = $_POST['price'];
    $sale_percent = $_POST['sale_percent'];
    $is_available = $_POST['is_available'];
    $cate_id = $_POST['category'];
    $sell_count = $_POST['sell_count'];
    $rating = $_POST['rating'];
    $view = $_POST['view'];
  
    
    $dest = "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/View/assets/game/".$_FILES['image']['name'];
    // $dest = "/xampp/htdocs/pro1014_DuAn/sources/View/assets/game/".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $dest);

    $productDAO = new ProductDAO();
    $product = $productDAO->getProductByID($id);
        
    if($_FILES['image']['name'] == ""){
        $productDAO->updateProductWithoutImage($name,$cate_id,$price,$sale_percent,$is_available,$sell_count,$rating,$view,$id);
        header('location: ../View/admin/products.php');
    }else{
        $productDAO->updateProduct($name,$cate_id,'./assets/game/'.$img_url,$price,$sale_percent,$is_available,$sell_count,$rating,$view,$id);
        header('location: ../View/admin/products.php');
    }
?>