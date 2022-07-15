<?php

include "/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/ProductDAO.php";
include "/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";

    $name = $_POST['name'];
    $img_url = $_POST['image'];
    $cate_id = $_POST['category'];
    $price = $_POST['price'];
    $sale_percent = $_POST['sale_percent'];

    $productDAO = new ProductDAO();


    $productDAO2 = new ProductDAO();
    $checkgame = $productDAO2->isGameExist($name);
    
    echo($checkgame);
    if ($checkgame == 1) {
        echo ('<script>
                var result = confirm("This game already existed!!");
                if (result == true){
                window.location= "../View/admin/products.php";}
                else window.location= "../View/admin/products.php";
            </script>');
    } else {
            $product = $productDAO->addProductAdmin($name,$img_url,$cate_id,$price,$sale_percent);
            if ( $product == true){
                echo ('<script>
                            var result = confirm("Upload Success!!");
                            if (result == true){
                                window.location= "../View/admin/products.php";}
                            else window.location= "../View/admin/products.php";
                        </script>');
            } else return false;
        }
        
?>