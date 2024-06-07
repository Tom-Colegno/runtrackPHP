<?php
$host = 'localhost';
$dbname = 'jour5';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT SUM(superficie) AS superficie_totale FROM etage";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "<table border='1'>";
        
        echo "<tr><th>superficie_totale</th></tr>";

        echo "<tr><td>" . htmlspecialchars($result['superficie_totale']) . "</td></tr>";

        echo "</table>";
    } else {
        echo "Erreur : Aucun résultat trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
