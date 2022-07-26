<?php
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/FeedbackDAO.php";

include "/XAMPP/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/XAMPP/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/XAMPP/htdocs/pro1014_duan/sources/Model/DAO/ProductDAO.php";
include "/XAMPP/htdocs/pro1014_duan/sources/Model/DAO/FeedbackDAO.php";

$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'error';

function submitFeedback($uid, $pid, $score, $content) {
    $resp = [];
    $feedbackDAO = new FeedbackDAO();
    $score *= 20;
    if(!$feedbackDAO->isFeedbackExist($uid, $pid)) {
        $resp['status'] = $feedbackDAO->insertNewFeedback($uid, $pid, $score, $content) ? 'success' : 'fail';
        $feedbackDAO->removeFeedbackByUserIDAndProductID($uid, $pid);
    } else $resp['status'] = 'exist';
    return $resp;
}


switch ($method) {
    case 'submit':
        $uid = isset($_REQUEST['uid']) ? $_REQUEST['uid'] : 'error';
        $pid = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : 'error';
        $score = isset($_REQUEST['score']) ? $_REQUEST['score'] : 'error';
        $content = isset($_REQUEST['content']) ? $_REQUEST['content'] : 'error';
        echo json_encode(submitFeedback($uid, $pid, $score, $content));
        break;
    
    default:
        # code...
        break;
}
?>