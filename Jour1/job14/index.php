<?php
function leet_speak($str) {
    // Tableau de correspondance des lettres à remplacer
    $leet_array = array(
        'a' => '4',
        'e' => '3',
        'i' => '1',
        'o' => '0',
        's' => '5',
        't' => '7'
    );

    $str = strtolower($str);

    for ($i = 0; $i < strlen($str); $i++) {
        if (array_key_exists($str[$i], $leet_array)) {
            $str[$i] = $leet_array[$str[$i]];
        }
    }

    return $str;
}

echo leet_speak("Hello World!");
?>
