<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichez les nombres de 1 à 100 en mettant un retour à la ligne.
        Si le nombre est un multiple de 3, affichez “Fizz”
        Si le nombre est un multiple de 5, affichez “Buzz”
        Si le nombre est un multiple de 3 et de 5, affichez “FizzBuzz”.</title>
</head>
<body>
    <?php
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "FizzBuzz<br>";
        } elseif ($i % 3 == 0) {
            echo "Fizz<br>";
        } elseif ($i % 5 == 0) {
            echo "Buzz<br>";
        } else {
            echo $i . "<br>";
        }
    }
    ?>
</body>
</html>