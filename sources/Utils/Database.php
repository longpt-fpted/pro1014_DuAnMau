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
            return new mysqli("localhost", "id19378188_adminsql", '~L$JFQ(2T+Or$zzH', "id19378188_pro1014_duan");
        } else return $database;
    }
}
?>