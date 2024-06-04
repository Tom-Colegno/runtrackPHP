<!DOCTYPE html>
<html>
<head>
    <title>Créez un formulaire avec deux entrées largeur et hauteur.
        Vous devez créer un algorithme qui affiche, à la validation du formulaire, une
        maison telle que :
        Si on entre les valeurs : largeur = 10 et hauteur = 5 dans les champs, la maison
        qui s’affiche doit ressembler à l’exemple ici :</title>
    <style>
        pre {
            font-family: monospace;
            line-height: 1.2;
        }
    </style>
</head>
<body>
    <form action="" method="get">
        <label for="largeur">Largeur:</label>
        <input type="number" id="largeur" name="largeur" required><br><br>
        <label for="hauteur">Hauteur:</label>
        <input type="number" id="hauteur" name="hauteur" required><br><br>
        <input type="submit" value="Afficher la maison">
    </form>

    <?php
    if (isset($_GET['largeur']) && isset($_GET['hauteur'])) {
        $largeur = (int)$_GET['largeur'];
        $hauteur = (int)$_GET['hauteur'];

        // Validation des valeurs
        if ($largeur < 2 || $hauteur < 2) {
            echo "<p>La largeur et la hauteur doivent être au moins 2.</p>";
        } else {
            // Génération de la maison
            echo "<pre>";

            // Toit de la maison
            for ($i = 0; $i < $largeur / 2; $i++) {
                echo str_repeat(" ", ($largeur / 2) - $i - 1);
                echo "/";
                echo str_repeat(" ", $i * 2);
                echo "\\";
                echo "\n";
            }

            // Corps de la maison
            for ($i = 0; $i < $hauteur; $i++) {
                echo "|";
                echo str_repeat(" ", $largeur - 2);
                echo "|\n";
            }

            // Base de la maison
            echo str_repeat("-", $largeur);
            echo "</pre>";
        }
    }
    ?>
</body>
</html>