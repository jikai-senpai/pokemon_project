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

function createContrato($pdo, $nameSicario, $idPokemon) {
    try{
        $sql = "INSERT INTO contrato (name_sicario, id_pokemon) VALUES (:name_sicario, :id_pokemon)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name_sicario', $nameSicario);
        $stmt->bindParam(':id_pokemon', $idPokemon);
        $stmt->execute();
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}


