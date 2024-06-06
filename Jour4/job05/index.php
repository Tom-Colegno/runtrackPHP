<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Initialisation de la grille et des variables de jeu
if (!isset($_SESSION['grid'])) {
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['current_player'] = 'X';
    $_SESSION['message'] = '';
}

if (!isset($_SESSION['score_X'])) {
    $_SESSION['score_X'] = 0;
}

if (!isset($_SESSION['score_O'])) {
    $_SESSION['score_O'] = 0;
}

if (!isset($_SESSION['player_X'])) {
    $_SESSION['player_X'] = 'Joueur X';
}

if (!isset($_SESSION['player_O'])) {
    $_SESSION['player_O'] = 'Joueur O';
}

if (isset($_POST['set_names'])) {
    $_SESSION['player_X'] = $_POST['player_X'];
    $_SESSION['player_O'] = $_POST['player_O'];
    $_SESSION['use_computer'] = isset($_POST['use_computer']);
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['current_player'] = 'X';
    $_SESSION['message'] = '';
}

if (isset($_POST['reset'])) {
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['current_player'] = 'X';
    $_SESSION['message'] = '';
}

if (isset($_POST['reset_scores'])) {
    $_SESSION['score_X'] = 0;
    $_SESSION['score_O'] = 0;
    $_SESSION['message'] = 'Les scores ont été réinitialisés !';
}

if (isset($_POST['cell'])) {
    list($row, $col) = explode('-', $_POST['cell']);
    if ($_SESSION['grid'][$row][$col] === '-') {
        $_SESSION['grid'][$row][$col] = $_SESSION['current_player'];
        $_SESSION['current_player'] = ($_SESSION['current_player'] === 'X') ? 'O' : 'X';
    }

    // Vérification des conditions de victoire
    $winner = checkWinner($_SESSION['grid']);
    if ($winner) {
        $_SESSION['message'] = $_SESSION['player_' . $winner] . " a gagné !";
        if ($winner === 'X') {
            $_SESSION['score_X']++;
        } else {
            $_SESSION['score_O']++;
        }
        $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
        $_SESSION['current_player'] = 'X';
    } elseif (isGridFull($_SESSION['grid'])) {
        $_SESSION['message'] = "Match nul !";
        $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
        $_SESSION['current_player'] = 'X';
    } else {
        // Computer's turn if enabled
        if ($_SESSION['use_computer'] && $_SESSION['current_player'] === 'O') {
            computerMove();
        }
    }
}

function checkWinner($grid) {
    // Vérifier les lignes, les colonnes et les diagonales
    for ($i = 0; $i < 3; $i++) {
        if ($grid[$i][0] === $grid[$i][1] && $grid[$i][1] === $grid[$i][2] && $grid[$i][0] !== '-') {
            return $grid[$i][0];
        }
        if ($grid[0][$i] === $grid[1][$i] && $grid[1][$i] === $grid[2][$i] && $grid[0][$i] !== '-') {
            return $grid[0][$i];
        }
    }
    if ($grid[0][0] === $grid[1][1] && $grid[1][1] === $grid[2][2] && $grid[0][0] !== '-') {
        return $grid[0][0];
    }
    if ($grid[0][2] === $grid[1][1] && $grid[1][1] === $grid[2][0] && $grid[0][2] !== '-') {
        return $grid[0][2];
    }
    return null;
}

function isGridFull($grid) {
    foreach ($grid as $row) {
        foreach ($row as $cell) {
            if ($cell === '-') {
                return false;
            }
        }
    }
    return true;
}

function computerMove() {
    $emptyCells = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($_SESSION['grid'][$i][$j] === '-') {
                $emptyCells[] = [$i, $j];
            }
        }
    }

    if (!empty($emptyCells)) {
        $move = $emptyCells[array_rand($emptyCells)];
        $_SESSION['grid'][$move[0]][$move[1]] = 'O';
        $_SESSION['current_player'] = 'X';

        // Vérification des conditions de victoire après le coup de l'ordinateur
        $winner = checkWinner($_SESSION['grid']);
        if ($winner) {
            $_SESSION['message'] = $_SESSION['player_' . $winner] . " a gagné !";
            if ($winner === 'X') {
                $_SESSION['score_X']++;
            } else {
                $_SESSION['score_O']++;
            }
            $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
            $_SESSION['current_player'] = 'X';
        } elseif (isGridFull($_SESSION['grid'])) {
            $_SESSION['message'] = "Match nul !";
            $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
            $_SESSION['current_player'] = 'X';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu du Morpion</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
            flex-direction: column;
        }
        .game-container {
            text-align: center;
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            margin: auto;
            background-color: #e0f7fa;
        }
        td {
            width: 100px;
            height: 100px;
            text-align: center;
            font-size: 60px;
            border: 2px solid #b2dfdb;
            position: relative;
        }
        h1 {
            font-size: 3.3rem;
        }
        button {
            width: 100%;
            height: 100%;
            background: none;
            border: none;
            cursor: pointer;
            outline: none;
        }
        .playerX img,
        .playerO img {
            width: 80px;
            height: 80px;
        }
        .scoreboard {
            margin-bottom: 20px;
        }
        .scoreboard p {
            margin: 5px;
            font-size: 25px;
        }
        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
        .action-buttons button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 200px;
        }
        .action-buttons button:hover {
            background-color: #45a049;
        }
        .name-form {
            margin-top: 20px;
            text-align: center;
        }
        .name-form input {
            padding: 10px;
            margin: 5px;
            font-size: 16px;
        }
        .name-form label {
            display: block;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="name-form">
        <form method="post" action="">
            <input type="text" name="player_X" placeholder="Nom du Joueur X" required>
            <input type="text" name="player_O" placeholder="Nom du Joueur O" required>
            <label>
                <input type="checkbox" name="use_computer">
                Jouer contre l'ordinateur
            </label>
            <button type="submit" name="set_names">Démarrer le jeu</button>
        </form>
    </div>

    <div class="game-container">
        <h1>Jeu du Morpion</h1>
        <div class="scoreboard">
            <p><?php echo htmlspecialchars($_SESSION['player_X']); ?> (X): <?php echo $_SESSION['score_X']; ?></p>
            <p><?php echo htmlspecialchars($_SESSION['player_O']); ?> (O): <?php echo $_SESSION['score_O']; ?></p>
        </div>
        <p><?php echo htmlspecialchars($_SESSION['message']); ?></p>
        <form method="post" action="">
            <table>
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <tr>
                        <?php for ($j = 0; $j < 3; $j++): ?>
                            <td>
                                <?php if ($_SESSION['grid'][$i][$j] === '-'): ?>
                                    <button type="submit" name="cell" value="<?php echo "$i-$j"; ?>"></button>
                                <?php else: ?>
                                    <span class="<?php echo ($_SESSION['grid'][$i][$j] === 'X') ? 'playerX' : 'playerO'; ?>">
                                        <img src="images/<?php echo ($_SESSION['grid'][$i][$j] === 'X') ? 'x.svg' : 'o.svg'; ?>" alt="<?php echo $_SESSION['grid'][$i][$j]; ?>">
                                    </span>
                                <?php endif; ?>
                            </td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>
            <div class="action-buttons">
                <button type="submit" name="reset">Réinitialiser la partie</button>
                <button type="submit" name="reset_scores">Réinitialiser les scores</button>
            </div>
        </form>
    </div>
</body>
</html>