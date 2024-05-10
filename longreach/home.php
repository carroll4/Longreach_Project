<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "longreach";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <div class="grid-container">
            <div class="logo">
                <img src="Images/logo.jpg" style="float: left; width: 14%; height: auto;">
                <img src="Images/logo.jpg" style="float: right; width: 14%; height: auto;">
                <h1 id="title">Longreach Athletic FC</h1>
            </div>
            
            <div class="nav"><div class="btn-group">
                <button class="buttons home"><b>Home</b></button>
                <button class="buttons fixtures"onclick="location.href='fixtures.html'" ><b>Fixtures & Results</b></button>
                <button class="buttons fantasy" onclick="location.href='fantasy_team.php'"><b>Fantasy Team</b></button>
                <button class="buttons team" onclick="location.href='help.html'"><b>Help Page</b></button>
            </div></div>

            <div class="mid">
                <img src="Images/Cup.PNG" style="width: 59%; height: auto; padding: 2px;"><br>
                <div class="row">
                    <div class="column">
                        <a class="twitter-timeline" data-width="75%" data-height="370" data-theme="light" href="https://twitter.com/LongreachUTR?ref_src=twsrc%5Etfw">Tweets by LongreachUTR</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <div class="column">
                        <h1><b><u>Welcome to Longreach</u></b></h1>
                        <p>Welcome to the mighty reach!<br><br>
                        We are a local Sunday Football club located in Bristol that play for the Bristol Premeir Sunday Football league.
                        Longreach currently have 2 team in this league, Longreach firsts are currently in division 2 and the Reserves are in division 3.
                        Our home games are played at Patchway School fields on grass(BS32 4AJ).</p>
                    </div>           
                </div>
            </div>

            <div class="lower">
                <button class="buttons join" onclick="location.href='fantasy_team.php'"><b>Pick Fantasy Team</b></button>
                <br>
                <br>
                <h2 style="float: left;"><b><u>Top 5 Goal Scorers</u></b></h2>
                <?php
                $sql = "SELECT `Name`, `Goals`, `Assists`, `Games_Played`, `Points` FROM `players` ORDER BY `Goals` DESC LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr><th>Name</th><th>Goals</th><th>Assits</th><th>Games Played</th><th>Points</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Goals"]. "</td><td> " . $row["Assists"]. "</td><td>" . $row["Games_Played"]. "</td><td>" . $row["Points"]. "</td></tr>";
                    }
                        echo "</table>";
                    } else {
                        echo "0 results";
                }
                $conn->close();
                ?>
            </div>

            <div class="footer">
                <a href="https://www.instagram.com/longreach_afc/?hl=en-gb" target="_blank"><img src="Images/insta.jpg" style="float: right; width: 80px; height: 80px; padding: 2px;"></a>
                <a href="https://twitter.com/longreachutr" target="_blank"><img src="Images/twitter.png" style="float: right; width: 80px; height: 80px; padding: 2px;"></a>
                <br>
                <p style="float: left;"><b>Copy Right | Privacy Notice | Terms of Use</b></p>
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