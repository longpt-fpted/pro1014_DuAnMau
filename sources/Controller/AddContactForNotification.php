<?php
include "/storage/ssd2/188/19378188/public_html/Utils/Database.php";
include "/storage/ssd2/188/19378188/public_html/Model/DAO/ContactDAO.php";
    $fullname = $_POST['customer-name'];
    $email = $_POST['mail'];
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