<?php
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/NotifyDAO.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/FavoriteDAO.php";

$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';

function sendSaleOffNotifyToUsers($productID) {
    $resp = [];
    $favDAO = new FavoriteDAO();
    $notifyDAO = new NotifyDAO();

    $flag = false;

    $favorites = $favDAO->getFavoritesByProductID($productID);
    foreach ($favorites as $favorite) {
        if(!$notifyDAO->isNotifyExist($favorite->getUserID(), 0, $productID)) {
            $flag = $notifyDAO->createNotifyToUser($favorite->getUserID(), 0, $productID);
        }
    }
    
    $resp['status'] = $flag ? 'success' : 'fail' ;
    
    return $resp;
}
function sendFeedBackNotifyToUser($orderID, $userID) {
    $resp = [];
    $notifyDAO = new NotifyDAO();
    $orderdetailDAO = new OrderDetailDAO();
    $productDAO = new ProductDAO();

    $orderdetails = $orderdetailDAO->getAllOrderDetailPayedByUserIdAndOrderID($userID, $orderID);

    foreach($orderdetails as $orderdetail) {
        $product = $productDAO->getProductByID($orderdetail->getProductID());
        $resp['status'] = $notifyDAO->createNotifyToUser($userID, 1, $product->getID());
    }

    return $resp;
}
function removeNotify($id) {
    $resp = [];
    $notifyDAO = new NotifyDAO();
 
    $resp['status'] = $notifyDAO->removeNotifyByID($id) ? 'success' : 'fail';
    $resp['id'] = $id;

    return $resp;
}

switch ($method) {
    case 'remove':
        $nid = isset($_REQUEST['nid']) ? $_REQUEST['nid'] : 'error';

        echo json_encode(removeNotify($nid));
        break;
    case 'send':
        
        break;
    default:
        break;
}

?>