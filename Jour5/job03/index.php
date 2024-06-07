<?php
$host = 'localhost';
$dbname = 'jour5';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM etudiant';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Liste des étudiants</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date de Naissance</th>
                <th>Sexe</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($etudiants)) : ?>
                <?php foreach ($etudiants as $etudiant) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($etudiant['id']); ?></td>
                        <td><?php echo htmlspecialchars($etudiant['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                        <td><?php echo htmlspecialchars($etudiant['naissance']); ?></td>
                        <td><?php echo htmlspecialchars($etudiant['sexe']); ?></td>
                        <td><?php echo htmlspecialchars($etudiant['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Aucun étudiant trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
