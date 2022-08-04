<?php
class Charge {
    private $cardtype;
    private $cardvalue;
    private $cardcode;
    private $cardseri;

    public function __construct($cardtype, $cardvalue, $cardcode, $cardseri) {
        $this->cardtype = $cardtype;
        $this->cardvalue = $cardvalue;
        $this->cardcode = $cardcode;
        $this->cardseri = $cardseri;  
    }
    public function getCardtype() {
        return $this->cardtype;
    }
    public function getCardvalue() {
        return $this->cardvalue;
    }
    public function getCardcode() {
        return $this->cardcode;
    }
    public function getCardseri() {
        return $this->cardseri;
    }
    
}

?>