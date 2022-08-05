<?php

include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Mail.php";
include "../Model/DAO/ContactDAO.php";

    $message = $_POST['message'];
    $id = $_GET['id'];
    $mail = new Mail();

    $contactDAO = new ContactDAO();
    $contact = $contactDAO->getContactByID($id);
    $fullname = $contact->getFullname();
    $email = $contact->getEmail();
    $subject = $contact->getSubject();

    $mail->sendMail('p.thieenlong.304@gmail.com','test','message');
?>