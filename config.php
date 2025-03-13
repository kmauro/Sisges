<?php 

class Config{
    static public function cnx(){
        $db = new PDO("mysql:host=localhost;dbname=sisges", "root", "");

        return $db;
    }
}


?>