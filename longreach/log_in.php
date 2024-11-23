<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="stylesheet.css">
</head>
    <body>
      <div class="nav"><div class="btn-group">
                <button class="buttons home" onclick="location.href='home.php'"><b>Home</b></button>
      </div></div>

      <h3>
        <?php
        output_username();
        ?>
      </h3>

        <div class="modal-content">
        <form action="includes/signup.inc.php" method="post">
          <div class="container">
            <h1>Sign up:</h1>
            <label for="UserName">User Name:</label><br>
            <input type="text" id="username" name="username" placeholder="Enter UserName"><br>

            <label for="Email">Email address:</label><br>
            <input type="email" id="email" name="email" placeholder="Enter @email"><br>

            <label for="Password">Create Password:</label><br>
            <input type="password" id="pwd" name="pwd" placeholder="Enter Password"><br>
            <br>
            <button>Signup</button><br><br>
            </div>
          </form> 

          <?php
          check_signup_errors();
          ?>

          
          <?php //Login in form
          if (!isset($_SESSION["user_id"])) { ?>
            <form action="includes/login.inc.php" method="post">
            <div class="container">
              <h1>Log in:</h1>
              <label for="UserName">User Name:</label><br>
              <input type="text" id="username" name="username"><br>
              <label for="password">Password:</label><br>
              <input type="password" id="pwd" name="pwd">
              <br><br>
              <button>Login</button>
            </div>
          </form>
          <?php } ?>
          
          
          <?php
          check_login_errors();
          ?>

          <form action="includes/logout.inc.php" method="post">
            <div class="container">
              <button>Logout</button>
            </div>
          </form>

          

        </div>
    </body>
</html>