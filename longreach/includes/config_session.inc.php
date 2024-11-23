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

// Regenerate session ID before session start
if (isset($_SESSION["user_id"])) {
    if (isset($_SESSION["last_regeneration"])) {
        regenerate_session_id_loggedin();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id_loggedin();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
        }
    }
}

// Function to regenerate session ID when logged in
function regenerate_session_id_loggedin() {
    // Regenerate the session ID before starting the session
    session_regenerate_id(true);

    // Set a custom session ID using user_id (if needed)
    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    // Start the session
    session_start();

    // Save the last regeneration time
    $_SESSION["last_regeneration"] = time();
}

// Function to regenerate session ID for non-logged-in users
function regenerate_session_id() {
    // Regenerate the session ID
    session_regenerate_id(true);

    // Start the session
    session_start();

    // Save the last regeneration time
    $_SESSION["last_regeneration"] = time();
}
