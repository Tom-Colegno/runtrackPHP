<!DOCTYPE html>
<html>
<head>
    <title>Créez un algorithme qui affiche dans un tableau HTML l’ensemble des
        arguments $_POST et les valeurs associés.</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #fff;
        }
    </style>
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
        // Afficher les arguments et leurs valeurs dans un tableau HTML
        echo "<table>";
        echo "<tr><th>Argument</th><th>Valeur</th></tr>";
        foreach ($_POST as $cle => $valeur) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($cle) . "</td>";
            echo "<td>" . htmlspecialchars($valeur) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
