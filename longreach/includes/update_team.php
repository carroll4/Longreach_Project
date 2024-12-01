<?php
include 'connect.inc.php';
require_once 'config_session.inc.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get the selected player IDs from the form
$player1ID = $_POST['player1'];
$player2ID = $_POST['player2'];
$player3ID = $_POST['player3'];
$player4ID = $_POST['player4'];
$player5ID = $_POST['player5'];

// Fetch player points from the `players` table
$pointsQuery = "SELECT Points FROM `players` WHERE ID IN ($player1ID, $player2ID, $player3ID, $player4ID, $player5ID)";
$pointsResult = mysqli_query($conn, $pointsQuery);

// Calculate the total points for the team
$totalPoints = 0;
while ($row = mysqli_fetch_assoc($pointsResult)) {
    $totalPoints += $row['Points'];
}

// Update the team data in the `team_db` table
$updateQuery = "UPDATE `team_db` 
                SET player_1 = '$player1ID', player_2 = '$player2ID', player_3 = '$player3ID', player_4 = '$player4ID', player_5 = '$player5ID', team_total = '$totalPoints' 
                WHERE user_id = '$user_id' ORDER BY team_id DESC LIMIT 1";

if (mysqli_query($conn, $updateQuery)) {
    echo "Your team has been updated!";
    header("Location: ../fantasy_team.php");  // Redirect to view the updated team
    exit();
} else {
    echo "Error updating team: " . mysqli_error($conn);
}
?>
