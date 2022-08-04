<?php

    include "../Utils/Database.php";
    include "../Model/DAO/UserDAO.php";
    include "../Model/DAO/ProductDAO.php";


    $keyword = $_POST['keyword'];
    $userDAO = new UserDAO();
    $user = $userDAO->getUserBySearch($keyword);
    var_dump($user);

?>