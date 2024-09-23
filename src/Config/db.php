<?php
$host = 'localhost';
$db = 'sicarios_pokemones';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Configuramos el Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones para mejorar la seguridad y manejo de errores
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lanzar excepciones en caso de error
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Traer resultados como arrays asociativos
    PDO::ATTR_EMULATE_PREPARES   => false, // Deshabilitar la emulación de consultas preparadas
];

try {
    // Crear instancia de PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    // Manejar errores de conexión
    echo "Error de conexión: " . $e->getMessage();
}
