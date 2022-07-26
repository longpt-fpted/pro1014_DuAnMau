<?php

include "/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/ContactDAO.php";

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $type = $_POST['type'];

    $contactDAO = new ContactDAO();

    $contact = $contactDAO->insertNewContactToGetNotifications($fullname, $email, $type);
    if ( $contact == true){
        echo ('<script>
                    var result = confirm("Send Success!!");
                    if (result == true){
                        window.location= "../View/index.php";}
                    else window.location= "../View/index.php";
                </script>');
    } else return false;   
?>