<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/OrderDetailDAO.php";

$productDAO = new ProductDAO();
$userDAO = new UserDAO();
$orderDAO = new OrderDAO();
$orderDetailDAO = new OrderDetailDAO();

session_start();

$productID = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : 'error';
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';


function addProductToCart($productID) {
    global $productDAO;
    $resp = [];
    $product = $productDAO->getProductByID($productID);
    if($product != false) {
        // $_SESSION['cart'][] = json_encode($product);
        $resp['status'] = 'success';
        $resp['cart'] = $product;//$_SESSION['cart'];
    }  else $resp['status'] = 'fail';

    return $resp['cart'];
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