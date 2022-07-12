<?php
    include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
    include "../Model/DAO/CategoryDAO.php";
    include "../Model/DAO/ProductDAO.php";

    $cateDAO = new CategoryDAO();
    $category = $_POST['category'];
    $cate = $cateDAO->getCategoryByName($category);
    $id = $cate->getID();
    //var_dump($cate);
    //var_dump($id);
    $productDAO = new ProductDAO();
    $productCate = $productDAO->getProductByCateID($id);
    //var_dump($product);
    header("location: ../View/search.php");

?>