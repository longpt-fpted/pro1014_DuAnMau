<?php
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include '/storage/ssd2/188/19378188/public_html/Utils/Database.php';
include '/storage/ssd2/188/19378188/public_html/Model/DAO/UserDAO.php';
$uid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 'err';
$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : 'err';
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'err';

function deposit($userID, $amount) {
    $resp = [];
    $userDAO = new UserDAO();
    if(!$userDAO->isUserExist($userID)) {
        $resp['status'] = 'user';
    } else  {
        $user = $userDAO->getUserByID($userID);
        if($amount > 0 ) {
            $resp['status'] = $userDAO->depositByUserID($userID, $amount) ? 'success' : 'fail';
            $user->depositCurrency($amount);
            $resp['money'] = $user->getCurrency();
        } else  {
            $resp['status'] = 'low-than-zero';
        }
    }
    return $resp;
}

switch ($method) {
    case 'deposit':
        echo json_encode(deposit($uid, $amount));
        break;
}
?>