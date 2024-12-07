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
                <button class="buttons home" onclick="location.href='index.php'"><b>Home</b></button>
                <button class="buttons fixtures" onclick="location.href='fixtures.php'"><b>Fixtures & Results</b></button>
                <button class="buttons fantasy" onclick="location.href='fantasy_team.php'"><b>Fantasy Team</b></button>
                <button class="buttons team" onclick="location.href='help.php'"><b>Help Page</b></button>
            </div></div>

            <div class="footer">
                <a href="https://www.instagram.com/longreach_afc/?hl=en-gb" target="_blank"><img src="Images/insta.jpg" style="float: right; width: 8vw; height: 8vw; padding: 2px;"></a>
                <a href="https://twitter.com/longreachutr" target="_blank"><img src="Images/twitter.png" style="float: right; width: 8vw; height: 8vw; padding: 2px;"></a>
                <br>
                <p id="footer_p"><b>Copy Right | Privacy Notice | Terms of Use</b></p>
            </div>

            <div class="mid">
                <h2>To create your own UTR fantasy Team please click the log-in button below! </h2>
                <?php 
                if (!isset($_SESSION["user_id"])) { ?>
                <button class="buttons join" onclick="location.href='log_in.php'"><b>Log in</b></button>
                <?php } ?>
                <?php if (isset($_SESSION["user_id"])) { ?>  
                <button class="buttons join" onclick="location.href='log_in.php'"><b>Logout</b></button>
                 <?php }?>
                <br>
                <p><b>Team will consist of 5 Players of your choice.
                     Each player will score their own points based on how they preform throught the season.
                    Infomation on how points will be scored can be found on the help page. MUST BE LOGGED IN TO ACCESS THIS FEATURE!</b></p>

            </div>

            <div class="lower">
                <div class="btn-group">
                    <button class="button view_team" onclick="location.href='fantasy_team.php'"><b>View Team</b></button>
                    <button class="button leaderboard" onclick="location.href='leaderboard.php'"><b>Leaderboard</b></button>
                    <button class="button player_stats" onclick="location.href='stats.php'"><b>Players Stats</b></button>

                </div>
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
            <div class="left">
                <p></p>
            </div>

            <div class="right">
                <p></p>
            </div>
        </div>
    </body>
</html>