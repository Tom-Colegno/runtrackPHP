<?php
$host = 'localhost';
$dbname = 'jour5';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT salle.nom AS salle_nom, etage.nom AS etage_nom
            FROM salle
            JOIN etage ON salle.id_etage = etage.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo "<table border='1'>";
        
        echo "<tr>";
        echo "<th>Nom de la Salle</th>";
        echo "<th>Nom de l'Étage</th>";
        echo "</tr>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['salle_nom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['etage_nom']) . "</td>";
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
