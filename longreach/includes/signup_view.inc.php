<?php

declare(strict_types=1);

function check_signup_errors() {
    
    if(isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<h1>' . $error . '</h1>';
        }

        unset($_SESSION['errors_signup']);
    } 
    else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<script type="text/javascripy">
        window.onload = function () {
          alert("sign up successful") }
        </script>';;
    }
}