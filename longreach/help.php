<?php
include 'includes/connect.inc.php';
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
        <div class="grid-container">
            <div class="logo">
                <img src="Images/logo.jpg" id="logoleft">
                <img src="Images/logo.jpg" id="logoright">
                <h1 id="title">Longreach Athletic FC</h1>
                <h1 id="phonetitle">Longreach Athletic FC</h1>
            </div>
            
            <div class="nav"><div class="btn-group">
                <button class="buttons home" onclick="location.href='home.php'"><b>Home</b></button>
                <button class="buttons fixtures" onclick="location.href='fixtures.php'"><b>Fixtures & Results</b></button>
                <button class="buttons fantasy" onclick="location.href='fantasy_team.php'"><b>Fantasy Team</b></button>
                <button class="buttons team"><b>Help Page</b></button>
            </div></div>

            <div class="footer">
                <a href="https://www.instagram.com/longreach_afc/?hl=en-gb" target="_blank"><img src="Images/insta.jpg" style="float: right; width: 80px; height: 80px; padding: 2px;"></a>
                <a href="https://twitter.com/longreachutr" target="_blank"><img src="Images/twitter.png" style="float: right; width: 80px; height: 80px; padding: 2px;"></a>
                <br>
                <p style="float: left;"><b>Copy Right | Privacy Notice | Terms of Use</b></p>
            </div>

            <div class="mid">
                <h1><u>Contact us</u></h1>
                <p>If you are intrestred in joining Longreach Athletic please <a href="https://outlook.live.com/owa/" target="_blank">click here</a>
                     to contact one of are admins for details!</p>

                     <br>
                <h2 style="float: left;"><b><u>Leaderboard</u></b></h2>
                <?php
                $sql = "SELECT * FROM `team_db` ORDER BY `team_db`.`team_total` DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr><th>Name</th><th>Points</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["team_name"]. "</td><td>" . $row["team_total"]. "</td></tr>";
                    }
                        echo "</table>";
                    } else {
                        echo "0 results";
                }
                $conn->close();
                ?>
                <br>

            </div>
            
            <div class="lower">
                <div class="row">
                    <div class="column">
                        <div class="box1" style="width: 88%;">
                            <h2><u><b>Point System</b></u></h2> 
                            <p style="font: italic small-caps bold 14px/30px Georgia, serif; font-size: 16px;">
                                 <!---Goal for fowards = 4 Points <br>--->
                                 Goal = 3 Points <br>
                                 Assist = 2 Points <br>
                                 UTR Clean sheet(defence) = 3 Points <br>
                                 Game played = 1 Point <br>
                                 MOTM = 2 Points <br>
                                 Yellow card = -1 Point <br>
                                 Donkey = -2 Points <br>
                                <br>
                             <u>(Points will be updates 24 hours after matches)</u><br>
                            </p>
                        </div>
                    </div> 
                    <div class="column">
                        <img src="Images/trophy.webp" style="width: 78%;">
                    </div>              
                </div>
            </div>

            <div class="left">
                <p></p>
            </div>

            <div class="right">
                <p></p>
            </div>
        </div>
    </body>
</html>
