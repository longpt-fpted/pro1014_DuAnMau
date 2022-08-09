<?php
include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/ProductDAO.php";

    $name = $_POST['name'];
    $img_url = $_FILES['image']['name'];
    $cate_id = $_POST['category'];
    $price = $_POST['price'];
    $sale_percent = $_POST['sale_percent'];
    
    $dest = "/storage/ssd2/188/19378188/public_html/View/assets/game/".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $dest);

    $productDAO = new ProductDAO();

    $checkgame = $productDAO->isGameExist($name);
    
    if ($checkgame == 1) {
        echo ('<script>
                var result = confirm("This game already existed!!");
                if (result == true){
                window.location= "../View/admin/products.php";}
                else window.location= "../View/admin/products.php";
            </script>');
    } else {
            $product = $productDAO->addProduct($name,'./assets/game/'.$img_url,$cate_id,$price,$sale_percent);
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