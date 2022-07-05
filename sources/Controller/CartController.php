<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
$productDAO = new ProductDAO();
$userDAO = new UserDAO();

session_start();
$_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$productID = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : 'error';
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';


function addProductToCart($productID) {
    global $productDAO;
    $resp = [];
    $product = $productDAO->getProductByID($productID);
    if($product != false) {
        $_SESSION['cart'][] = $product;
        $resp['status'] = 'success';
    }  else $resp['status'] = 'fail';

    return $resp;
}


switch ($method) {
    case 'add':
        echo json_encode(addProductToCart($productID));

        break;
    
    default:
        # code...
        break;
}
?>