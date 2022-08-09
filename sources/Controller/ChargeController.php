<?php
    include "../Utils/Database.php";
    include "../Model/DAO/UserDAO.php";
    include "../Model/DAO/ChargeDAO.php";

    $cardtype = $_POST['card-type'];
    $cardvalue = $_POST['card-value'];
    $cardcode = $_POST['card-code'];
    $cardseri = $_POST['card-seri'];
    $id = $_POST['id'];
    

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByID($id);
    $currency = $user->getCurrency();
    $charge = new ChargeDAO();
    $card = $charge->getCardByCardcode($cardcode);

    // var_dump($card);
    $type = $card->getCardtype();
    $value = $card->getCardvalue();
    $code = $card->getCardcode();
    $seri = $card->getCardseri();
    //var_dump($value);
    if($cardtype == $type && $cardvalue == $value && $cardcode == $code && $cardseri == $seri){
        $currency = $currency + $value;
        //var_dump($currency);
        $userDAO->UserUpdateCurrency($currency,$id);
        header("location: ../View/user.php?id=$id");
    } else header("location: ../View/error404.php");



?>