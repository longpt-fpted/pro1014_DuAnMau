<?php
class OrderDetail {
    private $userID;
    private $productID;
    private $quantity;
    private $price;

    public function __construct($userID, $productID, $quantity, $price)
    {
        $this->userID = $userID;
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    public function getUserID() {
        return $this->userID;
    }
    public function getProductID() {
        return $this->productID;
    }
    public function getQuantity() {
        return $this->quantity;
    }
    public function setQuantity($newQuantity) {
        $this->quantity = $newQuantity;
    }
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($newPrice) {
        $this->price = $newPrice;
    }
}
?>