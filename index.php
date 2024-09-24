<?php
require_once 'src/Includes/Functions.php';

$pokemonNames = getAllPokemonNames($pdo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acción: Matar</title>
</head>
<body>
    <h1>Contratar sicario</h1>
    <label for="id">Nombre del sicario:</label>
    <input>
    <br>
    <h1>Seleccionar objetivo</h1>
    <label for="id">Nombre del objetivo:</label>
    <select>
        <?php foreach ($pokemonNames as $pokemon): ?>
            <option value="<?php echo htmlspecialchars($pokemon['name']); ?>">
                <?php echo htmlspecialchars($pokemon['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <br>
    <br>
    <button>Matar</button>

</body>
</html>