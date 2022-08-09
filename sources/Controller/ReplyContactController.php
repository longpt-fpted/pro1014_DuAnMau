<?php

// include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
// include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Mail.php";
include_once "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
include "/storage/ssd2/188/19378188/public_html/Utils/Mail.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/ContactDAO.php";
// include "../Model/DAO/ContactDAO.php";

    $id = $_POST['id'];
    $mess = $_POST['message'];
    $mail = new Mail();

    $contactDAO = new ContactDAO();
    $contact = $contactDAO->getContactByID($id);
    $fullname = $contact->getFullname();
    $email = $contact->getEmail();
    $subject = "DS Team trả lời về vấn đề của bạn <3";
    $message = "<i>Demon Stone</i> kính gửi <b>".$fullname."</b>.<br>".$mess."<br>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi. <br><i>Demon Stone</i>";

    if($mail->sendMail($email, $subject, $message)) {
        echo "<script>alert('Gửi câu trả lời thành công');</script>";
        header('location: ../View/admin/contacts.php');
    } else  header('location: ../View/error404.php');
?>