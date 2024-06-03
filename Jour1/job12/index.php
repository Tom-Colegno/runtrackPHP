<?php
function calcule($nombre1, $operateur, $nombre2) {
    switch ($operateur) {
        case '+':
            return $nombre1 + $nombre2;
        case '-':
            return $nombre1 - $nombre2;
        case '*':
            return $nombre1 * $nombre2;
        case '/':
            if ($nombre2 != 0) {
                return $nombre1 / $nombre2;
            } else {
                return "Division par zéro impossible";
            }
        case '%':
            return $nombre1 % $nombre2;
        default:
            return "Opérateur non valide";
    }
}

echo calcule(5, '+', 3);
echo "<br>";
echo calcule(10, '/', 2);
echo "<br>";
echo calcule(7, '%', 3);
?>
