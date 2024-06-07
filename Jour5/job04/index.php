<?php
$host = 'localhost';
$dbname = 'jour5';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT nom, capacite FROM salle";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo "<table border='1'>";
        echo "<tr><th>Nom</th><th>Capacité</th></tr>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['capacite']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Aucune salle trouvée.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
