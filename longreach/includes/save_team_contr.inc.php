<?php

declare(strict_types=1);

function create_user_team(object $pdo,string $user_id, string $player_1, string $player_2, string $player_3,
string $player_4, string $player_5) {
    set_user_team($pdo, $user_id, $player_1, $player_2, $player_3, $player_4, $player_5);
}