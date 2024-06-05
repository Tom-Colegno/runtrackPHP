<?php
function occurrences($str, $char) {
    if (!isset($str) || !isset($char) || strlen($char) != 1) {
        return "Paramètres invalides.";
    }

    $count = 0;
    for ($i = 0; isset($str[$i]); $i++) {
        if ($str[$i] == $char) {
            $count++;
        }
    }
    return $count;
}

echo occurrences("Bonjour", "o") . "<br>";
echo occurrences("LaPlateforme", "a") . "<br>";
echo occurrences("Hello World", "l") . "<br>";
echo occurrences("Hello World", "z") . "<br>";
echo occurrences("Hello World", "") . "<br>";
?>
