<!DOCTYPE html>
<html>
<head>
    <title>Créez un formulaire de connexion de type POST (se demander, pourquoi pas
        GET ?) ayant deux champs username et password.

        Après validation du formulaire :
        ➔ Si le username est “John” et le password est “Rambo” afficher “ce n'est
        pas ma guerre”
        ➔ Sinon afficher “votre pire cauchemar”</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Se connecter">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'John' && $password === 'Rambo') {
            echo "<p>ce n'est pas ma guerre</p>";
        } else {
            echo "<p>votre pire cauchemar</p>";
        }
    }
    ?>
</body>
</html>
