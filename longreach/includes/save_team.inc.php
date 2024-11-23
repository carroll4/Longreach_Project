<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user_id = $_POST["user_id"];
    $player_1 = $_POST["player_1"];
    $player_2 = $_POST["player_2"];
    $player_3 = $_POST["player_3"];
    $player_4 = $_POST["player_4"];
    $player_5 = $_POST["player_5"];
    $team_total = $_POST["team_total"];
  
    try{
      require_once 'dbh.inc.php';
      require_once 'save_team_model.inc.php';
      require_once 'save_team_contr.inc.php';
      require_once 'config_session.inc.php';


      create_user_team($pdo, $user_id, $player_1, $player_2, $player_3, $player_4, $player_5);

      header("Location: ../fantasy_team.php?save_team=success");
      //close off connection and statement
      $pdo = null;
      $stmt = null;
      die();
  
    } catch (PDOException $e) {
      die("Query failed: " . $e->getMessage());
    }
}
 else {
    header("Location: ../fantasy_team.php");
  die();
}
?>