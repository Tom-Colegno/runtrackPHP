<?php
// Déclaration des variables de différents types primitifs
$integerVar = 42;
$floatVar = 3.14;
$stringVar = "Hello, world!";
$boolVar = true;
$arrayVar = array(1, 2, 3);
$nullVar = null;

// Création d'un tableau associatif pour stocker les informations des variables
$variables = [
    ['type' => 'Integer', 'name' => 'integerVar', 'value' => $integerVar],
    ['type' => 'Float', 'name' => 'floatVar', 'value' => $floatVar],
    ['type' => 'String', 'name' => 'stringVar', 'value' => $stringVar],
    ['type' => 'Boolean', 'name' => 'boolVar', 'value' => $boolVar ? 'true' : 'false'],
    ['type' => 'Array', 'name' => 'arrayVar', 'value' => implode(", ", $arrayVar)],
    ['type' => 'Null', 'name' => 'nullVar', 'value' => 'null']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau des variables</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Tableau des variables</h2>

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Nom</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($variables as $variable): ?>
        <tr>
            <td><?php echo htmlspecialchars($variable['type']); ?></td>
            <td><?php echo htmlspecialchars($variable['name']); ?></td>
            <td><?php echo htmlspecialchars($variable['value']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
