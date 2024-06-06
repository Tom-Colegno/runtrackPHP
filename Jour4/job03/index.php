<?php
session_start();

if (!isset($_SESSION['prenoms'])) {
    $_SESSION['prenoms'] = [];
}

if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
    $_SESSION['prenoms'][] = htmlspecialchars($_POST['prenom']);
}

if (isset($_POST['reset'])) {
    $_SESSION['prenoms'] = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créez un formulaire qui contient un input de type text et un bouton. Lorsque
        l’on valide le formulaire, le contenu est ajouté dans une variable de session.
        Affichez l’ensemble des prénoms.
        Ajoutez un bouton “reset” qui permet de réinitialiser la liste.</title>
</head>
<body>
    <h1>Ajouter un prénom</h1>
    <form method="post" action="">
        <input type="text" name="prenom" placeholder="Entrez un prénom">
        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des prénoms</h2>
    <ul>
        <?php foreach ($_SESSION['prenoms'] as $prenom): ?>
            <li><?php echo $prenom; ?></li>
        <?php endforeach; ?>
    </ul>

    <form method="post" action="">
        <button type="submit" name="reset">Réinitialiser</button>
    </form>
</body>
</html>
