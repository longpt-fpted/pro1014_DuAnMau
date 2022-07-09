<?php

include "C:\wamp64\www\hihihaha\pro1014_DuAn\sources\Model\DAO\UserDAO.php";

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);

?>