<?php
function leetSpeak($str) {
    if (!isset($str)) {
        return "Paramètre invalide.";
    }

    $leetDictionary = [
        'A' => '4', 'a' => '4',
        'B' => '8', 'b' => '8',
        'E' => '3', 'e' => '3',
        'G' => '6', 'g' => '6',
        'L' => '1', 'l' => '1',
        'S' => '5', 's' => '5',
        'T' => '7', 't' => '7',
        'O' => '0', 'o' => '0',
    ];

    $leetStr = '';
    for ($i = 0; isset($str[$i]); $i++) {
        if (isset($leetDictionary[$str[$i]])) {
            $leetStr .= $leetDictionary[$str[$i]];
        } else {
            $leetStr .= $str[$i];
        }
    }
    return $leetStr;
}

echo leetSpeak("LaPlateforme") . "<br>"; // Devrait afficher "14Pl47ef0rm3"
echo leetSpeak("Bonjour") . "<br>"; // Devrait afficher "B0nj0ur"
echo leetSpeak("Hello World") . "<br>"; // Devrait afficher "H3110 W0r1d"
?>
