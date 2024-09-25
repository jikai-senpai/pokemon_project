<?php
require_once 'src/Includes/Functions.php';

$pokemonNames = getAllPokemonNames($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sicarioName = isset($_POST['sicario_name']) ? $_POST['sicario_name'] : '';

    $pokemonName = isset($_POST['pokemon_name']) ? $_POST['pokemon_name'] : '';
    $pokemonId = getPokemonIdByName($pdo, $pokemonName);

    if ($sicarioName && $pokemonId) {
        createContrato($pdo, $sicarioName, $pokemonId);
        echo 'Contrato creado exitosamente';
    } else {
        echo 'Error al crear el contrato';
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
</body>
</html>