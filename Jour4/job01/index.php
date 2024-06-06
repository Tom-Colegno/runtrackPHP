<?php
session_start();

if (!isset($_SESSION['nbVisites'])) {
    $_SESSION['nbVisites'] = 0;
}

$_SESSION['nbVisites']++;

if (isset($_POST['reset'])) {
    $_SESSION['nbVisites'] = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créez une variable nommée “nbVisites”. À chaque fois que la page est
        visitée, ajoutez 1. Affichez le contenu de cette variable.
        Ajoutez un bouton “reset” qui permet de réinitialiser ce compteur.</title>
</head>
<body>
    <h1>Compteur de visites</h1>
    <p>Nombre de visites : <?php echo $_SESSION['nbVisites']; ?></p>

    <form method="post" action="">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>