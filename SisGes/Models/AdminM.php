<?php
require_once "config.php";
class AdminModel{
    static public function ingresoM($datosC, $tablaDB){

        //$pdo = Config::cnx()->prepare("SELECT user, pass AS contra FROM $tablaDB WHERE user = ?");
        //$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        //$pdo->execute($datosC);
        //return $pdo->fetch();
        //$pdo-> close();
        $pdo = new PDO("mysql:host=localhost;dbname=sisges", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT user, pass AS contra FROM $tablaDB WHERE user = :usuario");
        $stmt->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();


    }
}

?>