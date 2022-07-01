<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/User.php";

// include './sources/Model/DAO/UserDAO.php';

$userDAO = new UserDAO();
var_dump($userDAO->getUserByID(1));

?>