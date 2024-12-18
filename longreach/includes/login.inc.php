<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
   $username = $_POST["username"];
   $pwd = $_POST["pwd"];

   try {
      //connections
      require_once 'dbh.inc.php';
      require_once 'login_model.inc.php';
      require_once 'login_contr.inc.php';

      // Error Handlers
      $errors = [];

      if(is_input_empty($username, $pwd)) {
         $errors["empty_input"] = "Fill in all fields!";
      }

      $result = get_user($pdo, $username);

      if(is_username_wrong($result)) {
         $errors["login_incorrect"] = "Incorrect login info!";
      }
      if(!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
         $errors["login_incorrect"] = "Incorrect login info!";
      }

      require_once 'config_session.inc.php';

      if ($errors) {
         $_SESSION["errors_login"] = $errors;

         header("Location: ../log_in.php");
         die();
      }
      //create session id 
      $newSessionId = session_create_id();
      //combines session id with user id
      $sessionId = $newSessionId . "_" . $result["id"];
      session_id($sessionId);

      $_SESSION["user_id"] = $result["id"];
      $_SESSION["user_username"] = htmlspecialchars($result["username"]);

      $_SESSION["last_regeneration"] = time();
      //send user to a location on success
      header("Location: ../index.php?login=success");
      $pdo = null;
      $statement = null;
      die();

   } catch (PDOException $e) {
      die("Query failed: " . $e->getMessage());
   }
   
}
else {
   header("location: ../log_in.php");
   die();
}

 
?>