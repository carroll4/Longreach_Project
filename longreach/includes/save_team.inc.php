<?php
include 'connect.inc.php';
require_once 'config_session.inc.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../log_in.php");
    exit();
}

// Get the player IDs and points from the form
$player1ID = $_POST['player1ID'];
$player2ID = $_POST['player2ID'];
$player3ID = $_POST['player3ID'];
$player4ID = $_POST['player4ID'];
$player5ID = $_POST['player5ID'];

// Get team name
$team_name = $_POST['team_name'];

// Get the points for each player
$query1 = "SELECT Points FROM `players` WHERE ID = $player1ID";
$query2 = "SELECT Points FROM `players` WHERE ID = $player2ID";
$query3 = "SELECT Points FROM `players` WHERE ID = $player3ID";
$query4 = "SELECT Points FROM `players` WHERE ID = $player4ID";
$query5 = "SELECT Points FROM `players` WHERE ID = $player5ID";

// Execute queries to get points
$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$result4 = mysqli_query($conn, $query4);
$result5 = mysqli_query($conn, $query5);

// Calculate total points
$totalPoints = 0;
if ($row = mysqli_fetch_assoc($result1)) {
    $totalPoints += $row['Points'];
}
if ($row = mysqli_fetch_assoc($result2)) {
    $totalPoints += $row['Points'];
}
if ($row = mysqli_fetch_assoc($result3)) {
    $totalPoints += $row['Points'];
}
if ($row = mysqli_fetch_assoc($result4)) {
    $totalPoints += $row['Points'];
}
if ($row = mysqli_fetch_assoc($result5)) {
    $totalPoints += $row['Points'];
}

// Insert the team into the `team_db` table (replace the `team_db` columns with your actual column names)
$query = "INSERT INTO `team_db` (user_id, team_name, player_1, player_2, player_3, player_4, player_5, team_total) 
          VALUES ('" . $_SESSION['user_id'] . "', '$team_name', '$player1ID', '$player2ID', '$player3ID', '$player4ID', '$player5ID', '$totalPoints')";

// Execute the query
if (mysqli_query($conn, $query)) {
    echo "Team successfully saved!";
    header("Location: ../fantasy_team.php");  // Redirect to the fantasy page after submission
    exit();
} else {
    echo "Error saving team: " . mysqli_error($conn);
}
?>
