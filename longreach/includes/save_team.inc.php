<?php
// Include necessary files
require_once 'dbh.inc.php';  // Database connection
require_once 'config_session.inc.php';  // Session management

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the player selections from the POST data
    $user_id = $_POST["user_id"];
    $player_1 = $_POST["player1ID"];
    $player_2 = $_POST["player2ID"];
    $player_3 = $_POST["player3ID"];
    $player_4 = $_POST["player4ID"];
    $player_5 = $_POST["player5ID"];
    $team_total = $_POST["sum"];  // You might want to calculate this on the backend if needed

    try {
        // Create a new entry in the 'team_db' table (or your relevant table)
        $sql = "INSERT INTO team_db (user_id, player_1, player_2, player_3, player_4, player_5, team_total) 
                VALUES (:user_id, :player1ID, :player2ID, :player3ID, :player4ID, :player5ID, :sum)";
        $stmt = $pdo->prepare($sql);
        
        // Bind values to the prepared statement
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':player1ID', $player_1);
        $stmt->bindParam(':player2ID', $player_2);
        $stmt->bindParam(':player3ID', $player_3);
        $stmt->bindParam(':player4ID', $player_4);
        $stmt->bindParam(':player5ID', $player_5);
        $stmt->bindParam(':sum', $team_total);

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