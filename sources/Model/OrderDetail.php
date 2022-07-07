<?php
class OrderDetail {
    private $orderID;
    private $productID;
    private $quantity;
    private $price;

    public function __construct($orderID, $productID, $price, $quantity = 1)
    {
        $this->orderID = $orderID;
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    public function getOrderID() {
        return $this->orderID;
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
    public function addProduct() {
        $this->quantity+=1;
    }
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($newPrice) {
        $this->price = $newPrice;
    }
}
?>