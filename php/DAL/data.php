<?php
require_once __DIR__ . '/database.php';
$db = new database();

// Verwerk formulier
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create') {
            $db->AddSpaceship($_POST['name'], $_POST['health'], $_POST['power'], $_POST['length']);
        }
        if ($_POST['action'] === 'update') {
            $db->UpdateSpaceship($_POST['id'], $_POST['name'], $_POST['health'], $_POST['power'], $_POST['length']);
        }
        if ($_POST['action'] === 'delete') {
            $db->DeleteSpaceship($_POST['id']);
        }
        
        if ($_POST['action'] === 'drop_database') {
            $db->DropDatabase();
        }
        
        // Redirect na POST
        header("Location: ../DAL/data.php");
        exit();
    }
}

// Check of we aan het bewerken zijn
$editShip = null;
if (isset($_GET['edit'])) {
    $editShip = $db->GetSpaceshipById($_GET['edit']);
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spaceship Beheer</title>
    <link rel="stylesheet" href="../../css/home.css">
</head>
<body>
    <div class="container">
        
        
        <a href="../../index.php"><button class="knop1">Terug naar Battle</button></a>
        
        <h2><?= $editShip ? 'Spaceship Bewerken' : 'Spaceship Toevoegen' ?></h2>
        
        <form method="POST">
            <input type="hidden" name="action" value="<?= $editShip ? 'update' : 'create' ?>">
            <?php if ($editShip): ?>
                <input type="hidden" name="id" value="<?= $editShip['id'] ?>">
            <?php endif; ?>
            
            <label>Naam:</label>
            <input type="text" name="name" value="<?= $editShip['name'] ?? '' ?>" required>
            
            <label>Health:</label>
            <input type="number" name="health" value="<?= $editShip['health'] ?? '' ?>" min="1" max="10" required>
            
            <label>Power:</label>
            <input type="number" name="power" value="<?= $editShip['power'] ?? '' ?>" min="1" max="4" required>
            
            <label>Length:</label>
            <input type="number" name="length" value="<?= $editShip['length'] ?? '' ?>" min="1" max="66" required>
            
            <button type="submit" class="<?= $editShip ? 'updaten' : 'toevoegen' ?>">
                <?= $editShip ? 'Opslaan' : 'Toevoegen' ?>
            </button>
            
            <?php if ($editShip): ?>
                <a href="data.php"><button type="button" class="knop1">Annuleren</button></a>
            <?php endif; ?>
        </form>

        <hr style="border-color: #ffd700; margin: 40px 0;">

        <h2>Alle Spaceships</h2>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Health</th>
                <th>Power</th>
                <th>Length</th>
                <th>Acties</th>
            </tr>
            <?php
            $spaceships = $db->GetSpaceships();
            foreach ($spaceships as $ship) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($ship['id']) . "</td>";
                echo "<td>" . htmlspecialchars($ship['name']) . "</td>";
                echo "<td>" . htmlspecialchars($ship['health']) . "</td>";
                echo "<td>" . htmlspecialchars($ship['power']) . "</td>";
                echo "<td>" . htmlspecialchars($ship['length']) . "</td>";
                echo "<td>";
                
                // Bewerken
                echo "<a href='?edit=" . htmlspecialchars($ship['id']) . "'><button type='button' class='updaten'>Bewerken</button></a> ";
                
                // Verwijderen
                echo "<form method='POST' style='display:inline;' onsubmit=\"return confirm('Weet je het zeker?');\">";
                echo "<input type='hidden' name='action' value='delete'>";
                echo "<input type='hidden' name='id' value='{$ship['id']}'>";
                echo "<button type='submit' class='verwijderen'>Verwijderen</button>";
                echo "</form>";
                
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <hr style="border-color: #ffd700; margin: 40px 0;">
        <p class="verloren"><strong>Waarschuwing!</strong> Deze actie verwijdert de volledige database inclusief alle spaceships.</p>
        
        <form method="POST" onsubmit="return confirm('Weet je ZEKER dat je de hele database wilt verwijderen? Dit kan niet ongedaan gemaakt worden!');">
            <input type="hidden" name="action" value="drop_database">
            <button type="submit" class="database-knop">Database Verwijderen</button>
        </form>
    </div>
</body>
</html>