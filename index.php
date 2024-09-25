<?php
require_once 'src/Includes/Functions.php';

$pokemonNames = getAllPokemonNames($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sicarioName = isset($_POST['sicario_name']) ? $_POST['sicario_name'] : '';
    $sicario = getSicarioByName($pdo, $sicarioName);

   $pokemonName = isset($_POST['pokemon_name']) ? $_POST['pokemon_name'] : '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acción: Matar</title>
</head>
<body>
    <form method="post">
        <h1>Contratar sicario</h1>
        <label for="id">Nombre del sicario:</label>
        <input type="text" id="sicario_name" name="sicario_name">
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
    <?php if (isset($sicario) && $sicario): ?>
        <h1>Información del sicario</h1>
        <p>Id: <?php echo htmlspecialchars($sicario['ID']); ?></p>
        <p>Nombre: <?php echo htmlspecialchars($sicario['NAME']); ?></p>
        <p>Status: <?php echo htmlspecialchars($sicario['WORKING']); ?></p>
    <?php else: ?>
        <p>No se encontró información del sicario.</p>
    <?php endif; ?>
</body>
</html>