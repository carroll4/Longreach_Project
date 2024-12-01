<?php
include 'includes/connect.inc.php';
require_once 'includes/config_session.inc.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the current team
$query = "SELECT * FROM `team_db` WHERE user_id = '$user_id' ORDER BY team_id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $player1ID = $row['player_1'];
    $player2ID = $row['player_2'];
    $player3ID = $row['player_3'];
    $player4ID = $row['player_4'];
    $player5ID = $row['player_5'];
    $teamTotal = $row['team_total'];
} else {
    echo "You don't have a saved team yet.";
    exit();
}
?>

<!-- Team edit form -->
<form method="POST" action="includes/update_team.php">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />

    <label>Player 1:</label>
    <select name="player1" id="dropdown1">
        <?php
        $players = mysqli_query($conn, "SELECT * FROM `players`");
        while ($c = mysqli_fetch_array($players)) {
            echo "<option value='{$c['ID']}'" . ($c['ID'] == $player1ID ? " selected" : "") . ">{$c['Name']} (Points: {$c['Points']})</option>";
        }
        ?>
    </select>
    <br>

    <label>Player 2:</label>
    <select name="player2" id="dropdown2">
        <?php
        $players = mysqli_query($conn, "SELECT * FROM `players`");
        while ($c = mysqli_fetch_array($players)) {
            echo "<option value='{$c['ID']}'" . ($c['ID'] == $player2ID ? " selected" : "") . ">{$c['Name']} (Points: {$c['Points']})</option>";
        }
        ?>
    </select>
    <br>

    <label>Player 3:</label>
    <select name="player3" id="dropdown3">
        <?php
        $players = mysqli_query($conn, "SELECT * FROM `players`");
        while ($c = mysqli_fetch_array($players)) {
            echo "<option value='{$c['ID']}'" . ($c['ID'] == $player3ID ? " selected" : "") . ">{$c['Name']} (Points: {$c['Points']})</option>";
        }
        ?>
    </select>
    <br>

    <label>Player 4:</label>
    <select name="player4" id="dropdown4">
        <?php
        $players = mysqli_query($conn, "SELECT * FROM `players`");
        while ($c = mysqli_fetch_array($players)) {
            echo "<option value='{$c['ID']}'" . ($c['ID'] == $player4ID ? " selected" : "") . ">{$c['Name']} (Points: {$c['Points']})</option>";
        }
        ?>
    </select>
    <br>

    <label>Player 5:</label>
    <select name="player5" id="dropdown5">
        <?php
        $players = mysqli_query($conn, "SELECT * FROM `players`");
        while ($c = mysqli_fetch_array($players)) {
            echo "<option value='{$c['ID']}'" . ($c['ID'] == $player5ID ? " selected" : "") . ">{$c['Name']} (Points: {$c['Points']})</option>";
        }
        ?>
    </select>
    <br>

    <input type="submit" value="Update Team">
</form>
