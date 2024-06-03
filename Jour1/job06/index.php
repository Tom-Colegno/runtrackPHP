<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichez les nombres de 0 à 100 en mettant un retour à la ligne entre chaque
        nombre.
        Si le nombre est entre 0 et 20 : écrire en italique.
        Si le nombre est compris entre 25 et 50 : souligner le nombre.
        Affichez “La Plateforme_” à la place de 42.</title>
</head>
<body>
    <?php
    for ($i = 0; $i <= 100; $i++) {
        if ($i == 42) {
            echo "La Plateforme_<br>";
        } elseif ($i >= 0 && $i <= 20) {
            echo "<i>$i</i><br>";
        } elseif ($i >= 25 && $i <= 50) {
            echo "<u>$i</u><br>";
        } else {
            echo "$i<br>";
        }
    }
    ?>
</body>
</html>
