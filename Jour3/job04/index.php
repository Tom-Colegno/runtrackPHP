<?php
function calcule($num1, $operation, $num2) {
    if (!isset($num1) || !isset($operation) || !isset($num2)) {
        return "Un ou plusieurs paramètres manquent.";
    }
    
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if ($num2 == 0) {
                return "Erreur : Division par zéro.";
            }
            return $num1 / $num2;
        case '%':
            if ($num2 == 0) {
                return "Erreur : Division par zéro.";
            }
            return $num1 % $num2;
        default:
            return "Opération non valide.";
    }
}

echo calcule(10, '+', 5) . "<br>";
echo calcule(10, '-', 5) . "<br>";
echo calcule(10, '*', 5) . "<br>";
echo calcule(10, '/', 5) . "<br>";
echo calcule(10, '/', 0) . "<br>";
echo calcule(10, '%', 3) . "<br>";
echo calcule(10, '%', 0) . "<br>";
echo calcule(10, '^', 5) . "<br>";
?>