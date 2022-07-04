<?php
// define("HOST_NAME", "localhost:3306");
// define("USER_NAME", "root");
// define("PASSWORD", "");
// define("DATABASE", "pro1014_duan");

class Database {
    public function __construct() {
        
    }
    public function getDatabase($database = null) {
        if($database == null) {
            return new mysqli("localhost:3306", "root", "", "pro1014_duan");
        } else return $database;
    }
}
?>