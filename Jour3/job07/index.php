<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day3 Job07</title>
</head>
<body>

<form method="post" action="">
    <label for="str">Texte :</label>
    <input type="text" id="str" name="str" required>
    <br>
    <label for="fonction">Fonction :</label>
    <select id="fonction" name="fonction" required>
        <option value="gras">Gras</option>
        <option value="cesar">César</option>
        <option value="plateforme">Plateforme</option>
    </select>
    <br>
    <button type="submit">Valider</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $str = $_POST['str'];
    $fonction = $_POST['fonction'];

    if ($fonction == 'gras') {
        echo gras($str);
    } elseif ($fonction == 'cesar') {
        echo cesar($str, 2);
    } elseif ($fonction == 'plateforme') {
        echo plateforme($str);
    }
}

function gras($str) {
    $words = explode(' ', $str);
    foreach ($words as &$word) {
        if (ctype_upper($word[0])) {
            $word = "<b>$word</b>";
        }
    }
    return implode(' ', $words);
}

function cesar($str, $decalage = 2) {
    $result = '';
    $decalage = $decalage % 26;
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (ctype_alpha($char)) {
            $code = ord($char);
            if (ctype_upper($char)) {
                $char = chr(($code - 65 + $decalage) % 26 + 65);
            } else {
                $char = chr(($code - 97 + $decalage) % 26 + 97);
            }
        }
        $result .= $char;
    }
    return $result;
}

function plateforme($str) {
    $words = explode(' ', $str);
    foreach ($words as &$word) {
        if (substr($word, -2) == 'me') {
            $word .= '_';
        }
    }
    return implode(' ', $words);
}
?>

</body>
</html>
