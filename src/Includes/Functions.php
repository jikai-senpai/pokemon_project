<?php
require_once 'src/Config/db.php';
require_once 'src/Classes/Contrato.php';
require_once 'src/Classes/Pokemon.php';

function getAllPokemonNames($pdo) {
    try{
        $sql = "SELECT name FROM pokemones";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        return [];
    }
}




