<?php
$cookie_lifetime = time() + (365 * 24 * 60 * 60);

if (isset($_POST['connexion']) && !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    setcookie('prenom', $prenom, $cookie_lifetime);
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}

if (isset($_POST['deco'])) {
    setcookie('prenom', '', time() - 3600);
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}

$prenom = isset($_COOKIE['prenom']) ? htmlspecialchars($_COOKIE['prenom']) : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créez un formulaire de connexion qui contient un input de type de text
        nommé “prenom” et un bouton submit nommé “connexion”. Lorsque l’on
        valide le formulaire, le prénom est ajouté dans un cookie. Si un utilisateur a
        déjà entré son prénom, n'affichez plus le formulaire de connexion. À la place,
        écrivez “Bonjour prenom !” et ajouter un bouton “Déconnexion” nommé
        “deco”. Lorsque l’utilisateur se déconnecte, il faut à nouveau afficher le
        formulaire de connexion.</title>
</head>
<body>
    <?php if ($prenom): ?>
        <h1>Bonjour <?php echo $prenom; ?> !</h1>
        <form method="post" action="">
            <button type="submit" name="deco">Déconnexion</button>
        </form>
    <?php else: ?>
        <h1>Formulaire de connexion</h1>
        <form method="post" action="">
            <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
            <button type="submit" name="connexion">Connexion</button>
        </form>
    <?php endif; ?>
</body>
</html>
