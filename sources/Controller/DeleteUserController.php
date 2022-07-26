<?php

// include "C:\wamp64\www\hihihaha\pro1014_DuAn\sources\Model\DAO\UserDAO.php";

// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";

include "/XAMPP/htdocs/pro1014_duan/sources/Utils/Database.php";
include "/XAMPP/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);

?>