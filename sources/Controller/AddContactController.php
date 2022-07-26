<?php

include "/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/ContactDAO.php";

    $fullname = $_POST['customer-name'];
    $email = $_POST['mail'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $type = $_POST['type'];

    $contactDAO = new ContactDAO();

    $contact = $contactDAO->insertNewContact($fullname, $email, $subject, $message, $type);
    if ( $contact == true){
        echo ('<script>
                    var result = confirm("Send Success!!");
                    if (result == true){
                        window.location= "../View/contact.php";}
                    else window.location= "../View/contact.php";
                </script>');
    } else return false;   
?>