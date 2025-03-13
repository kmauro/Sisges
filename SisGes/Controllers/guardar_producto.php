<?php /*
//require_once '../config.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $subcategoria = $_POST['subcategoria'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $cantidadD = $_POST['cantidadD'];
    $proveedor = $_POST['proveedor'];

    if (empty($nombre) || empty($subcategoria) || empty($precio) || empty($cantidad) || empty($cantidadD) || empty($proveedor)) {
        die("Todos los campos son obligatorios");
    }

    try {


        $pdo = new PDO("mysql:host=localhost;dbname=sisges", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insertar producto
        $stmt = $pdo->prepare("INSERT INTO productos (nombre, subcategoria_id, precio, cantidad, cantidad_deseada) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $subcategoria, $precio, $cantidad, $cantidadD]);

        $productoID = $pdo->lastInsertId();

        $stmt = $pdo->prepare("INSERT INTO productos_proveedores (proveedor_id, producto_id) VALUES (?, ?)");
        $stmt->execute([$proveedor, $productoID]);
        if($stmt->execute([$proveedor, $productoID])){
            return 1;
        }else{
            return 0;
        }
        header("location:index.php?route=stock");
        //$stmt->close();
    } catch (PDOException $e) {
        echo "Error al agregar producto: " . $e->getMessage();
    }


    
} */
?>



<?php
require_once '../config.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $categoria = $_POST['categoria'];
    $subcategoria = $_POST['subcategoria'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $cantidadD = $_POST['cantidadD'];
    $proveedor = $_POST['proveedor'];

    if (empty($nombre) || empty($categoria) || empty($subcategoria) || empty($precio) || empty($cantidad) || empty($proveedor)) {
        die("Todos los campos son obligatorios");
    }

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=sisges", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO productos (nombre, subcategoria_id, precio, cantidad, cantidad_deseada) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $subcategoria, $precio, $cantidad, $cantidadD]);

        $productoID = $pdo->lastInsertId();

        $stmt = $pdo->prepare("INSERT INTO productos_proveedores (proveedor_id, producto_id) VALUES (?, ?)");
        if($stmt->execute([$proveedor, $productoID])){
            header("location:index.php?route=stock");
        }

        
    } catch (PDOException $e) {
        echo "Error al agregar producto: " . $e->getMessage();
    }
}
?>

