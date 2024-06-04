<!DOCTYPE html>
<html>
<head>
    <title>Développez un algorithme qui affiche le nombre d’arguments $_GET.</title>
</head>
<body>
    <form action="" method="get">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom"><br><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom"><br><br>
        <label for="age">Âge:</label>
        <input type="text" id="age" name="age"><br><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET)) {
        $nombreArguments = count($_GET);

        echo "Nombre d'arguments passés en GET : " . $nombreArguments . "<br>";

        if ($nombreArguments > 0) {
            echo "Les arguments sont :<br>";
            foreach ($_GET as $cle => $valeur) {
                echo htmlspecialchars($cle) . " : " . htmlspecialchars($valeur) . "<br>";
            }
        }
    }
    ?>
</body>
</html>
