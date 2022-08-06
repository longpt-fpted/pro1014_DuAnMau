<?php

// include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Database.php";
// include "C:/xampp/htdocs/pro1014_DuAn/sources/Utils/Mail.php";
include_once "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Mail.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ContactDAO.php";
// include "../Model/DAO/ContactDAO.php";

    $id = $_POST['id'];
    $message = $_POST['message'];
    $mail = new Mail();

    $contactDAO = new ContactDAO();
    $contact = $contactDAO->getContactByID($id);
    $fullname = $contact->getFullname();
    $email = $contact->getEmail();
    $subject = $contact->getSubject();

    if($mail->sendMail($email, $subject, $message)) {
        header('location: ../View/admin/contacts.php');
    } else  header('location: ../View/error404.php');
?>