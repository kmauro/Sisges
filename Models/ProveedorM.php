<?php

class ProveedorModel{

    static public function mostrarProveedoresM($tablaDB, $datosID){
        if($datosID != 0){
            $sql = "SELECT * FROM $tablaDB INNER JOIN productos_proveedores ON proveedores.id = productos_proveedores.proveedor_id WHERE productos_proveedores.producto_id = :idProd";
            
        }else{
            $sql = "SELECT * FROM $tablaDB";
        }
        $pdo = Config::cnx()->prepare($sql);
        if($datosID != 0) {
             $pdo->bindParam(":idProd", $datosID, PDO::PARAM_INT);
        }

        $pdo->execute();

        return $pdo->fetchAll();

        $pdo->close();
    }
    
}

?>