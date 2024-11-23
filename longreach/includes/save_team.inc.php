<?php
// Include necessary files
require_once 'dbh.inc.php';  // Database connection
require_once 'config_session.inc.php';  // Session management

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the player selections from the POST data
    $user_id = $_POST["user_id"];
    $player_1 = $_POST["player_1"];
    $player_2 = $_POST["player_2"];
    $player_3 = $_POST["player_3"];
    $player_4 = $_POST["player_4"];
    $player_5 = $_POST["player_5"];
    $team_total = $_POST["team_total"];  // You might want to calculate this on the backend if needed

    try {
        // Create a new entry in the 'user_teams' table (or your relevant table)
        $sql = "INSERT INTO user_teams (user_id, player_1, player_2, player_3, player_4, player_5, team_total) 
                VALUES (:user_id, :player_1, :player_2, :player_3, :player_4, :player_5, :team_total)";
        $stmt = $pdo->prepare($sql);
        
        // Bind values to the prepared statement
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':player_1', $player_1);
        $stmt->bindParam(':player_2', $player_2);
        $stmt->bindParam(':player_3', $player_3);
        $stmt->bindParam(':player_4', $player_4);
        $stmt->bindParam(':player_5', $player_5);
        $stmt->bindParam(':team_total', $team_total);

        // Execute the statement
        $stmt->execute();

        // Redirect to the fantasy team page with a success message
        header("Location: fantasy_team.php?save_team=success");
        exit();
    } catch (PDOException $e) {
        // Handle any errors
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect if the form is not submitted via POST
    header("Location: fantasy_team.php");
    exit();
}
?>