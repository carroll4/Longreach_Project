<?php

declare(strict_types=1);

function set_user_team(object $pdo,string $user_id, string $player_1, string $player_2, string $player_3,
string $player_4, string $player_5) {
    $query = "INSERT INTO users (user_id, player_1, player_2, player_3, player_4, player_5) VALUES
    (:user_id, :player_1, :player_2, :player_3, :player_4, :player_5);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":player_1", $player_1);
    $stmt->bindParam(":player_2", $player_2);
    $stmt->bindParam(":player_3", $player_3);
    $stmt->bindParam(":player_4", $player_4);
    $stmt->bindParam(":player_5", $player_5);
    $stmt->execute();

}