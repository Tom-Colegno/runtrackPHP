<!DOCTYPE html>
<html>
<head>
    <title>Créez un formulaire de type GET (se demander, pourquoi pas POST ?) avec un
        champ nommé nombre.

        Après validation du formulaire :
        ➔ Si la valeur entrée est un nombre pair, afficher “Nombre pair”
        ➔ Si c’est un nombre impair, afficher “Nombre impair”</title>
</head>
<body>
    <form action="" method="get">
        <label for="nombre">Entrez un nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <input type="submit" value="Vérifier">
    </form>

    <?php
    // Ajouter des messages de débogage
    echo "<p>Formulaire soumis avec la méthode: " . $_SERVER['REQUEST_METHOD'] . "</p>";

    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        
        // Afficher la valeur soumise pour le débogage
        echo "<p>Valeur soumise: " . htmlspecialchars($nombre) . "</p>";

        if (is_numeric($nombre)) {
            if ($nombre % 2 == 0) {
                echo "<p>Nombre pair</p>";
            } else {
                echo "<p>Nombre impair</p>";
            }
        } else {
            echo "<p>Veuillez entrer un nombre valide.</p>";
        }
    }
    ?>
</body>
</html>
