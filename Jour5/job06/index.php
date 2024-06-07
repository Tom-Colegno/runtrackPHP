<?php
$host = 'localhost';
$dbname = 'jour5';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM etudiant WHERE prenom LIKE 'T%'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo "<table border='1'>";
        
        echo "<tr>";
        foreach (array_keys($result[0]) as $header) {
            echo "<th>" . htmlspecialchars($header) . "</th>";
        }
        echo "</tr>";

        foreach ($result as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Aucun étudiant trouvé avec un prénom commençant par 'T'.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>