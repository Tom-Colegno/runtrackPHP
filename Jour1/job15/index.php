<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Transformation de chaîne de caractères</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $str = $_POST["str"];
        $transformation = $_POST["transformation"];

        switch ($transformation) {
            case 'gras':
                
                $resultat = preg_replace_callback('/\b[A-Z][a-z]*\b/', function ($matches) {
                    return "<strong>" . $matches[0] . "</strong>";
                }, $str);
                break;
            case 'césar':
                function césar($str, $décalage = 2) {
                    $résultat = "";
                    $longueur = strlen($str);
                    for ($i = 0; $i < $longueur; $i++) {
                        $char = $str[$i];
                        if (ctype_alpha($char)) {
                            $majuscule = ctype_upper($char);
                            $char = chr((ord($char) + $décalage - ($majuscule ? 65 : 97)) % 26 + ($majuscule ? 65 : 97));
                        }
                        $résultat .= $char;
                    }
                    return $résultat;
                }
                $resultat = césar($str);
                break;
            case 'plateforme':
                $resultat = preg_replace('/me\b/', '_', $str);
                break;
            default:
                $resultat = "Aucune transformation sélectionnée";
        }

        echo "<p>Résultat de la transformation : $resultat</p>";
    }
    ?>

    <form method="post">
        <label for="str">Chaîne de caractères :</label>
        <input type="text" id="str" name="str" required>
        <br><br>
        <label for="transformation">Choix de transformation :</label>
        <select id="transformation" name="transformation">
            <option value="gras">Gras</option>
            <option value="césar">César</option>
            <option value="plateforme">Plateforme</option>
        </select>
        <br><br>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
