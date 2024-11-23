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

    // Initialize total points
    $total_points = 0;

    try {
        // Retrieve the points for each selected player from the database
        $sql = "SELECT Points FROM players WHERE ID IN (:player_1, :player_2, :player_3, :player_4, :player_5)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':player_1', $player_1, PDO::PARAM_INT);
        $stmt->bindParam(':player_2', $player_2, PDO::PARAM_INT);
        $stmt->bindParam(':player_3', $player_3, PDO::PARAM_INT);
        $stmt->bindParam(':player_4', $player_4, PDO::PARAM_INT);
        $stmt->bindParam(':player_5', $player_5, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Fetch the points for each player and calculate the total points
        $player_points = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($player_points as $point) {
            $total_points += $point['Points']; // Sum the points
        }

        // Insert the user's team into the database
        $insert_sql = "INSERT INTO user_teams (user_id, player_1, player_2, player_3, player_4, player_5, team_total) 
                       VALUES (:user_id, :player_1, :player_2, :player_3, :player_4, :player_5, :team_total)";
        $insert_stmt = $pdo->prepare($insert_sql);

        // Bind values to the prepared statement
        $insert_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $insert_stmt->bindParam(':player_1', $player_1, PDO::PARAM_INT);
        $insert_stmt->bindParam(':player_2', $player_2, PDO::PARAM_INT);
        $insert_stmt->bindParam(':player_3', $player_3, PDO::PARAM_INT);
        $insert_stmt->bindParam(':player_4', $player_4, PDO::PARAM_INT);
        $insert_stmt->bindParam(':player_5', $player_5, PDO::PARAM_INT);
        $insert_stmt->bindParam(':team_total', $total_points, PDO::PARAM_INT);

        // Execute the statement to insert the team into the database
        $insert_stmt->execute();

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
