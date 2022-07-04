<?php 
class Product {
    private $id;
    private $cate_id;
    private $name;
    private $price;
    private $sale_percent;
    private $rating;
    private $img_url;
    private $view;
    private $sell_count;
    private $isAvailable;
    public function __construct($id, $cate_id, $name, $price, $sale_percent, $rating, $img_url, $view, $sell_count, $isAvailable) {
        $this->id = $id;
        $this->cate_id = $cate_id;
        $this->name = $name;
        $this->price = $price;
        $this->sale_percent = $sale_percent;
        $this->rating = $rating;
        $this->img_url = $img_url;
        $this->view = $view;
        $this->sell_count = $sell_count;
        $this->isAvailable = $isAvailable;
    }
    public function getID() {
        return $this->id;
    }
    public function getCateID() {
        return $this->cate_id;
    }
    public function setCateID($newCateID) {
        $this->cate_id = $newCateID;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($newName) {
        $this->name = $newName;
    }
    public function setPrice($newPrice) {
        $this->price = $newPrice;
    }
    public function getPrice() {
        return $this->price;
    }
    public function setSale($newSale) {
        $this->sale_percent = $newSale;
    }
    public function getSale() {
        return $this->sale_percent;
    }
    public function getTotalPrice() {
        return $this->price - ($this->price * $this->sale_percent)/100;
    }
    public function getRating() {
        return $this->rating;
    }
    public function setRating($newRating) {
        $this->rating = $newRating;
    }
    public function getImg() {
        return $this->img_url;
    }
    public function setImg($newImg) {
        $this->img_url = $newImg;
    }
    public function getView() {
        return $this->view;
    }
    public function setView($newView) {
        $this->view = $newView;
    }
    public function addOneView() {
        $this->view++;
    }
    public function getSellCount() {
        return $this->sell_count;
    }
    public function setSellCount($newSellCount) {
        $this->sell_count = $newSellCount;
    }
    public function getAvailable() {
        return $this->isAvailable;
    }
    //0 true 1 false
    public function setAvailable($flag) {
        $this->isAvailable = $flag;
    }
    public function __toString() {
        return "$this->id - $this->cate_id - $this->name - $this->price - $this->sale_percent - $this->rating - $this->img_url - $this->isAvailable";
    }
}
?>