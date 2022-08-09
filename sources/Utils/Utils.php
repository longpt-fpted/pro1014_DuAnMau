<?php
class Utils { 
    public function __construct() {
        
    }
    function formatMoney($price) {
        return number_format($price, 0, '', '.').'VND';
    }
    public function objectToArrayConvert($object) {
        return (array) $object;
    }
    public function contentDecode($content) {
        return str_replace("+"," ",html_entity_decode($content));
    }
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
?>