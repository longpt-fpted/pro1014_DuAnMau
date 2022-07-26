<?php
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/FavoriteDAO.php";

include "/XAMPP/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/XAMPP/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/XAMPP/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
include "/XAMPP/htdocs/pro1014_duan/sources/Model/DAO/FavoriteDAO.php";

$userID = isset($_REQUEST['user']) ? $_REQUEST['user'] : 'error';
$productID = isset($_REQUEST['product']) ? $_REQUEST['product'] : 'error';
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error'; //Chuc nang - Them Xoa


function addProductToFavorite($userID, $productID) {
    $favoriteDAO = new FavoriteDAO();
    $productDAO = new ProductDAO();
    $resp = [];

    if(!$favoriteDAO->isExistFavorite($userID, $productID)) {
        $resp['status'] = $favoriteDAO->createNewFavorite($userID, $productID) ? 'success' : 'fail';
        $pd = $productDAO->getProductByID($productID);

        $fav = $favoriteDAO->getFavoritesByUserAndProduct($userID, $productID);
        $resp['product'] = ['uid' => $userID,'pid' => $pd->getID(), 'name' => $pd->getName(), 'totalPrice' => $pd->getTotalPrice(), 'price' => $pd->getPrice(), 'date' => $fav->getDate(), 'img' => $pd->getImg()];
    } else {
        $resp['status'] = 'contained';
        $resp['pid'] = $productID;
        $resp['pname'] = $productDAO->getProductByID($productID)->getName();
    }
    return $resp;
}
function removeProductFromFavorite($userID, $productID) {
    $favoriteDAO = new FavoriteDAO();
    $resp = [];

    $resp['status'] = $favoriteDAO->deleteFavoriteByUserIDandProductID($userID, $productID) ? 'success' : 'fail';
    $resp['pid'] = $productID;

    return $resp;
}


switch ($method) {
    case 'error':
        $respERR = [];
        $respERR['status'] = 'error';
        echo json_encode($respERR);
        break;
    case 'add':
        echo json_encode(addProductToFavorite($userID, $productID));
        break;
    case 'remove':
        /*
            ['status' => 'success', ] => {
                status: success,
            }
        */
        echo json_encode(removeProductFromFavorite($userID, $productID)); //string "{status: success,}"

        break;
}

?>