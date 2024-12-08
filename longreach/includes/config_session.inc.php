<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

// Set session cookie parameters
session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

// Start session
session_start();

// Regenerate session every 30 minutes
if (isset($_SESSION["user_id"])) {
    $interval = 60 * 30;

    if (!isset($_SESSION["last_regeneration"]) || time() - $_SESSION["last_regeneration"] >= $interval) {
        regenerate_session_id_loggedin();
    }
} else {
    $interval = 60 * 30;

    if (!isset($_SESSION["last_regeneration"]) || time() - $_SESSION["last_regeneration"] >= $interval) {
        regenerate_session_id();
    }
}

// Regenerate session ID with user ID (only works if user is logged in)
function regenerate_session_id_loggedin() {
    session_regenerate_id(true);

    // Generate a new session ID with the user ID
    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id($userId . "_"); // session_create_id() generates a new session ID safely.

    // Update the session with the new ID
    $_SESSION["last_regeneration"] = time();
}

// Regenerate session ID
function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}