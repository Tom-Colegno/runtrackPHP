<?php
if (!isset($_COOKIE['nbVisites'])) {
    setcookie('nbVisites', 0, time() + 3600);
    $nbVisites = 0;
} else {
    $nbVisites = (int)$_COOKIE['nbVisites'] + 1;
    setcookie('nbVisites', $nbVisites, time() + 3600);
}

if (isset($_POST['reset'])) {
    setcookie('nbVisites', 0, time() + 3600 * 24 * 30);
    $nbVisites = 0;
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créez un cookie “nbVisites”. À chaque fois que la page est visitée, ajouter 1.
        Affichez le contenu du cookie.
        Ajoutez un bouton “reset” qui permet de réinitialiser le compteur.</title>
</head>
<body>
    <h1>Compteur de Visites avec Cookies</h1>
    <p>Nombre de visites : <?php echo $nbVisites; ?></p>
    <form method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>