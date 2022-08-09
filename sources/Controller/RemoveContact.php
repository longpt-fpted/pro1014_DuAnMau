<?php
include "/storage/ssd2/188/19378188/public_html/Model/DAO/ContactDAO.php";
// include "/xampp/htdocs/pro1014_DuAn/sources/Model/DAO/ContactDAO.php";

    $id = $_GET['id'];

    $contactDAO = new ContactDAO();

    $contact = $contactDAO->removeContactByID($id);
    if ($contact == true){
        echo ('<script>
                    var result = confirm("Removed Success!!");
                    if (result == true){
                        window.location= "../View/admin/contacts.php";}
                    else window.location= "../View/admin/contacts.php";
                </script>');
    } else return false;   
?>