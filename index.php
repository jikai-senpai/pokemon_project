<?php
require_once 'src/Includes/Functions.php';

$pokemonNames = getAllPokemonNames($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sicarioName = isset($_POST['sicario_name']) ? $_POST['sicario_name'] : '';

    $pokemonName = isset($_POST['pokemon_name']) ? $_POST['pokemon_name'] : '';
    $pokemonId = getPokemonIdByName($pdo, $pokemonName);

    if ($sicarioName && $pokemonId) {
        createContrato($pdo, $sicarioName, $pokemonId);
    } else {
        echo 'Error al crear el contrato';
    }
}

$idPokemonContartos = getIdPokemonContratos($pdo);
$pokemonNamesFromContratos = [];

foreach ($idPokemonContartos as $idPokemon) {
    $pokemonNameByContrato = getPokemonNameById($pdo, $idPokemon['id_pokemon']);
    if ($pokemonNameByContrato) {
        $pokemonNamesFromContratos[] = $pokemonNameByContrato;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sicarios para pokemones</title>
</head>
<body>
    <form method="post">
        <h1>Contratar sicario</h1>
        <label for="id">Nombre del sicario:</label>
        <input type="text" name="sicario_name">
        <br>
        <h1>Seleccionar objetivo</h1>
        <label for="id">Nombre del objetivo:</label>
        <select name="pokemon_name">
            <?php foreach ($pokemonNames as $pokemon): ?>
                <option value="<?php echo htmlspecialchars($pokemon['name']); ?>">
                    <?php echo htmlspecialchars($pokemon['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>
        <br>
        <button type="submit">Contratar</button>
    </form>
    <ul>
        <?php foreach ($pokemonNamesFromContratos as $pokemonName): ?>
            <?php
            // Obtener la fecha de creación del contrato
            $createAt = getCreateAtByPokemonName($pdo, $pokemonName);
            $fechaCreacion = new DateTime($createAt);
            $fechaActual = new DateTime();
            $diferencia = $fechaActual->diff($fechaCreacion);

            // Verificar si han pasado 2 minutos o más
            if ($diferencia->i >= 2) {
                $mensaje = htmlspecialchars($pokemonName) . " ha sido eliminado.";
            } else {
                $mensaje = "Contrato para eliminar a " . htmlspecialchars($pokemonName) . ", creado.";
            }
            ?>
            <li>
                <?php echo $mensaje; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>