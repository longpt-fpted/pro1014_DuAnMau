<?php
class Discount {
    private $type, $userID,$quantity, $startDate, $expireDate;
    public function __construct($type, $userID, $quantity, $startDate, $expireDate) {
        $this->type = $type;
        $this->userID = $userID;
        $this->quantity = $quantity;
        $this->startDate = $startDate;
        $this->expireDate = $expireDate;
    }
    public function getUserID() {
        return $this->userID;
    }
    public function getPrice() {
        switch ($this->type) {
            case 0:
                return 100000;
                break;
            case 1:
                return 200000;
                break;
            case 2:
                return 500000;
                break;
        }
    }
    public function getType() {
        return $this->type;
    }
    public function setQuantity($newQuantity) {
        $this->quantity = $newQuantity;
    }
    public function getQuantity() {
        return $this->quantity;
    }
    public function getStartDate() {
        return $this->startDate;
    }
    public function getExpireDate() {
        return $this->expireDate;
    }
    public function setExpireDate($newExpireDate) {
        $this->expireDate = $newExpireDate;
    }
}
?>