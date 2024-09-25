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

function getPokemonIdByName($pdo, $name) {
    try{
        $sql = "SELECT id FROM pokemones WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function createContrato($pdo, $sicarioName, $pokemonId) {
    try{
        $sql = "INSERT INTO contrato (sicario_name, id_pokemon) VALUES (:sicario_name, :id_pokemon)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':sicario_name', $sicarioName);
        $stmt->bindParam(':id_pokemon', $pokemonId);
        $stmt->execute();
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}


