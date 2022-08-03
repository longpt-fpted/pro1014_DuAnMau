<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/ContactDAO.php";
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