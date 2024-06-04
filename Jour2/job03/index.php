<!DOCTYPE html>
<html>
<head>
    <title>Développez un algorithme qui affiche le nombre d’arguments $_POST.</title>
</head>
<body>
    <form action="" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom"><br><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom"><br><br>
        <label for="age">Âge:</label>
        <input type="text" id="age" name="age"><br><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Compter le nombre d'arguments dans $_POST
        $nombreArguments = count($_POST);

        // Afficher le nombre d'arguments
        echo "Nombre d'arguments passés en POST : " . $nombreArguments . "<br>";

        // Optionnel : afficher les arguments et leurs valeurs
        if ($nombreArguments > 0) {
            echo "Les arguments sont :<br>";
            foreach ($_POST as $cle => $valeur) {
                echo htmlspecialchars($cle) . " : " . htmlspecialchars($valeur) . "<br>";
            }
        }
    }
    ?>
</body>
</html>
