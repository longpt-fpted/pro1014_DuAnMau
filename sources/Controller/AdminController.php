<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/DAO/UserDAO.php";
// include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/User.php";

$userDAO = new UserDAO();
echo (json_encode((array)$userDAO->getUserByID(1)));
// echo json_encode($userDAO->getUserByID(1));


?>