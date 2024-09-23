<?php
require_once 'src/Config/db.php';
require_once 'src/Classes/Sicario.php';
require_once 'src/Classes/Pokemon.php';

try {
    // Preparar la consulta SQL
    $sql = "SELECT * FROM pokemones WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Vincular el parámetro
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Establecer el valor del parámetro
    $id = 1;

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->fetch();

    // Mostrar el resultado
    if ($result) {
        echo "Id: " . $result['ID'] . "<br>";
        echo "Name: " . $result['NAME'] . "<br>";
        echo "Type: " . $result['TYPE'] . "<br>";
        echo "Status: " . ($result['STATUS'] ? 'Activo' : 'Inactivo') . "<br>";
    } else {
        echo "No se encontró el registro.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}