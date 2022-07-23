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
        $resp['parent'] = $parentID;
        $resp['cid'] = $commentDAO->getNewestReplyComment($userID, $productID, $parentID)->getID();
    }

    return $resp;
}
function remove($commentID, $userID) {
    $resp = [];
    if($userID == 'error') {
        $resp['status'] = 'login';
    } else {
        $commentDAO = new CommentDAO();
        $resp['status'] = $commentDAO->removeCommentByID($commentID) ? 'success' : 'fail'; 
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
        $userGetID = isset($_REQUEST['comment-userGet']) ? $_REQUEST['comment-userGet'] : 'error';
        $parentID = isset($_REQUEST['comment-parent']) ? $_REQUEST['comment-parent'] : 'error';
        $userID = isset($_REQUEST['comment-user']) ? $_REQUEST['comment-user'] : 'error';
        $productID = isset($_REQUEST['comment-product']) ? $_REQUEST['comment-product'] : 'error';
        $text = isset($_REQUEST['comment-input']) ? $_REQUEST['comment-input'] : 'error';
        $response = reply($productID, $userID, $parentID, $text);
        $response['user'] = $userGetID;
        echo json_encode($response);
        break;
    case 'remove':
        $userID = isset($_REQUEST['uid']) ? $_REQUEST['uid'] : 'error';
        $commentID = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : 'error';
        echo json_encode(remove($commentID, $userID));
        break;
    default:
        # code...
        break;
}

?>