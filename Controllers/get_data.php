<?php
require_once '../config.php'; // Incluye la conexión a la base de datos

header('Content-Type: application/json');

if (isset($_GET['type'])) {
    $type = $_GET['type'];

    try {
        if ($type == 'categorias') {
            $stmt = "SELECT id, nombre FROM categorias";
            $pdo = Config::cnx()->prepare($stmt);
            $pdo->execute();
        } elseif ($type == 'subcategorias' && isset($_GET['categoria_id'])) {
            $pdo = Config::cnx()->prepare("SELECT id, nombre FROM subcategorias WHERE categoria_id = ?");
            $pdo->execute([$_GET['categoria_id']]);
        } elseif ($type == 'proveedores') {
            $stmt = "SELECT id, nombre FROM proveedores";
            $pdo = Config::cnx()->prepare($stmt);
            $pdo->execute();
        } else {
            echo json_encode([]);
            exit;
        }

        echo json_encode($pdo->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error en la consulta']);
    }
}