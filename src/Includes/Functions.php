<?php
require_once 'src/Config/db.php';
require_once 'src/Classes/Sicario.php';
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

function getSicarioByName($pdo, $name) {
    try{
        $sql = "SELECT * FROM sicarios WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['name' => $name]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        return null;
    }
}


