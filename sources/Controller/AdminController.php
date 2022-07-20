<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";

include "./NotifyController.php";

function updateProduct($product) {
    $productDAO = new ProductDAO();
    $resp = [];

    if($productDAO->isProductExist($product->getID())) {
        $resp['status'] = $productDAO->updateProduct($product) ? 'success' : 'fail';
        if($product->getSale() != 0)  
            $resp['send-notify'] = sendSaleOffNotifyToUsers($product->getID())['status'];
    }
    else $resp['status'] = 'not-exist'; 

    return $resp;
}
function addProduct($product) {
    $productDAO = new ProductDAO();
    $resp = [];

    if(!$productDAO->isProductExist($product->getID())) 
        $resp['status'] = $productDAO->insertNewProduct($product) ? 'success' : 'fail';
    else $resp['status'] = 'exist'; 

    return $resp;
}
function deleteProduct($id) {
    $productDAO = new ProductDAO();
    $resp = [];

    if($productDAO->isProductExist($id)) 
        $resp['status'] = $productDAO->deleteProductByID($id) ? 'success' : 'fail';
    else $resp['status'] = 'not-exist'; 

    return $resp;
}

$productDAO = new ProductDAO();

$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';
$pID = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : 'error';
$pCate_id = isset($_REQUEST['pcate_id']) ? $_REQUEST['pcate_id'] : 'error';
$pName = isset($_REQUEST['pname']) ? $_REQUEST['pname'] : 'error';
$pPrice = isset($_REQUEST['pprice']) ? $_REQUEST['pprice'] : 'error';
$pSale = isset($_REQUEST['psale']) ? $_REQUEST['psale'] : 'error';
$pImg = isset($_REQUEST['pimg']) ? $_REQUEST['pimg'] : 'error';
$pAvail = isset($_REQUEST['pavail']) ? $_REQUEST['pavail'] : 'error';

switch ($method) {
    case 'padd':
        $product = new Product(0, $pCate_id, $pName, $pPrice, $pSale, 0, $pImg, 0, 0, 1);
        echo json_encode(addProduct($product));
        break;
    case 'pdelete': 
        echo json_encode(deleteProduct($pID));
        break;
    case 'pupdate':
        $product = $productDAO->getProductByID($pID);
        $product->setName($pName);
        $product->setCateID($pCate_id);
        $product->setPrice($pPrice);
        $product->setSale($pSale);
        $product->setImg($pImg);
        $product->setAvailable($pAvail);
        echo json_encode(updateProduct($product));
        break;
    default:
        echo json_encode(['status' => 'all out']);
        break;
}
?>