<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Utils.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/CommentDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";

$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';

function comment($productID, $userID, $text) {
    $resp = [];
    $utils = new Utils();
    if($userID == 'error') {
        $resp['status'] = 'login';
    } else {
        $commentDAO = new CommentDAO();
        $text = $utils->contentDecode($text);
        $comment = new Comment(0, $userID, $productID, $text, 0, 0);
        $resp['status'] = $commentDAO->insertNewComment($comment) ? 'success' : 'fail';
    }

    return $resp;
}
function reply($productID, $userID, $parentID, $text) {
    $resp = [];
    $utils = new Utils();
    if($userID == 'error') {
        $resp['status'] = 'login';
    } else {
        $commentDAO = new CommentDAO();
        $text = $utils->contentDecode($text);
        $comment = new Comment(0, $userID, $productID, $text, $parentID, 0);
        $resp['status'] = $commentDAO->insertNewComment($comment) ? 'success' : 'fail';
    }

    return $resp;
}

switch ($method) {
    case 'comment':
        $userID = isset($_REQUEST['comment-user']) ? $_REQUEST['comment-user'] : 'error';
        $productID = isset($_REQUEST['comment-product']) ? $_REQUEST['comment-product'] : 'error';
        $text = isset($_REQUEST['comment-input']) ? $_REQUEST['comment-input'] : 'error';
        echo json_encode(comment($productID, $userID, $text));
        break;
    case 'reply':
        $parentID = isset($_REQUEST['comment-parent']) ? $_REQUEST['comment-parent'] : 'error';
        $userID = isset($_REQUEST['comment-user']) ? $_REQUEST['comment-user'] : 'error';
        $productID = isset($_REQUEST['comment-product']) ? $_REQUEST['comment-product'] : 'error';
        $text = isset($_REQUEST['comment-input']) ? $_REQUEST['comment-input'] : 'error';
        echo json_encode(reply($productID, $userID, $parentID, $text));
        break;
    default:
        # code...
        break;
}

?>