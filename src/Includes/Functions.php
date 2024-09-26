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

function getPokemonNameById($pdo, $name) {
    try{
        $sql = "SELECT name FROM pokemones WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $name);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function getCreateAtByPokemonName($pdo, $pokemonName) {
    try {
        $sql = "SELECT create_at FROM contrato c
                JOIN pokemones p ON c.id_pokemon = p.id
                WHERE p.name = :name
                ORDER BY create_at DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $pokemonName);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function createContrato($pdo, $sicarioName, $pokemonId) {
    try {
        // Revisa si el pokemon ya esta muerto
        $sql = "SELECT create_at FROM contrato WHERE id_pokemon = :id_pokemon ORDER BY create_at DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_pokemon', $pokemonId);
        $stmt->execute();
        $createAt = $stmt->fetchColumn();

        $pokemonName = getPokemonNameById($pdo, $pokemonId);

        if ($createAt) {
            $fechaCreacion = new DateTime($createAt);
            $fechaActual = new DateTime();
            $diferencia = $fechaActual->diff($fechaCreacion);

            if ($diferencia->i >= 2) {
                echo "$pokemonName ya esta muerto.";
                return;
            }
        }

        // Crear el contrato
        $sql = "INSERT INTO contrato (sicario_name, id_pokemon) VALUES (:sicario_name, :id_pokemon)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':sicario_name', $sicarioName);
        $stmt->bindParam(':id_pokemon', $pokemonId);
        $stmt->execute();

        return "Contrato para $pokemonName, creado.";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getIdPokemonContratos($pdo) {
    try{
        $sql = "SELECT id_pokemon FROM contrato";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        return [];
    }
}
