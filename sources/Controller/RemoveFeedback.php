<?php
include "/storage/ssd2/188/19378188/public_html/Model/DAO/FeedbackDAO.php";
// include "/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/FeedbackDAO.php";

$id = $_GET['uid'];
$product_id = $_GET['pid'];

    $feedbackDAO = new FeedbackDAO();

    $feedback = $feedbackDAO->removeFeedbackByUserIDAndProductID($id, $product_id);
    if ( $feedback == true){
        echo ('<script>
                    var result = confirm("Removed Success!!");
                    if (result == true){
                        window.location= "../View/admin/feedbacks.php";}
                    else window.location= "../View/admin/feedbacks.php";
                </script>');
    } else return false;   
?>