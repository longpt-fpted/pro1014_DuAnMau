<?php
class Utils { 
    public function __construct() {
        
    }
    function formatMoney($price) {
        return number_format($price, 0, '', '.');
    }
    public function objectToArrayConvert($object) {
        return (array) $object;
    }
    public function contentDecode($content) {
        return str_replace("+"," ",html_entity_decode($content));
    }
}
?>