<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $email = $_POST["email"];

  try{
    require_once 'dbh.inc.php';
    //Always have model before contoler
    require_once 'signup_model.inc.php';
    require_once 'signup_contr.inc.php';

    // Error Handlers
    $errors = [];

    if(is_input_empty($username, $pwd, $email)) {
      $errors["empty_input"] = "Fill in all fields!";
    }
    if(is_email_invalid($email)) {
      $errors["invalid_email"] = "Invalid email used!";
    }
    if(is_username_taken($pdo, $email)) {
      $errors["username_taken"] = "Username alreafy taken!";
    }
    if(is_email_registered($pdo, $email)) {
      $errors["email_used"] = "Email already registered!";
    }

    require_once 'config_session.inc.php';

    if ($errors) {
      $_SESSION["errors_signup"] = $errors;
      header("Location: ../log_in.php");
      die();
    }
    //log in user if no errors
    create_user($pdo, $pwd, $username, $email);

    header("Location: ../log_in.php?signup=success");
    //close off connection and statement
    $pdo = null;
    $stmt = null;
    die();

  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }

} else {
  header("Location: ../log_in.php");
  die();
}
?>