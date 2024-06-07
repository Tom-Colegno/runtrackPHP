<?php
$host = 'localhost';
$dbname = 'jour5';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT prenom, nom, naissance FROM etudiant WHERE sexe = 'Femme'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo "<table border='1'>";
        echo "<tr><th>Prénom</th><th>Nom</th><th>Date de Naissance</th></tr>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['naissance']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Aucune étudiante trouvée.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
