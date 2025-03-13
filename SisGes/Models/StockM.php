<?php

require_once "config.php";

class StockModel{

    public static function mostrarStockM($tablaDB, $datosID){
        $sql = "SELECT productos.id, productos.nombre AS producto, categorias.nombre AS categoria, subcategorias.nombre AS subcategoria,  precio, cantidad, cantidad_deseada FROM $tablaDB INNER JOIN subcategorias ON productos.subcategoria_id = subcategorias.id INNER JOIN categorias ON subcategorias.categoria_id = categorias.id";
        if($datosID != 0){
            $sql = $sql + " WHERE productos.subcategoria_id = :idsubcategoria;";
        }
        $pdo = Config::cnx()->prepare($sql);
        if($datosID != 0){
            $pdo->bindParam(":idsubcategoria", $datosID, PDO::PARAM_INT);
        }
        $pdo->execute();

        return $pdo->fetchAll();

        $pdo->close();
    }

    public static function agregarProductoM($tablaDB, $datosRegistro){
        try {


            $pdo = new PDO("mysql:host=localhost;dbname=sisges", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Insertar producto
            $stmt = $pdo->prepare("INSERT INTO $tablaDB (nombre, subcategoria_id, precio, cantidad, cantidad_deseada) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$datosRegistro["nombre"], $datosRegistro["subcategoria_id"], $datosRegistro["precio"], $datosRegistro["cantidad"], $datosRegistro["cantidad_deseada"]]);
    
            $productoID = $pdo->lastInsertId();
    
            $stmt = $pdo->prepare("INSERT INTO productos_proveedores (proveedor_id, producto_id) VALUES (?, ?)");
            
            if($stmt->execute([$datosRegistro["proveedor"], $productoID])){
                return 1;
            }else{
                return 0;
            }
            
            $stmt->close();
        } catch (PDOException $e) {
            echo "Error al agregar producto: " . $e->getMessage();
        }
    }

}

?>
