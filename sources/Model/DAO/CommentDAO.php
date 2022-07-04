<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Utils/Database.php";
class CommentDAO {
    private $database;
    public function __construct()
    {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
}
?>