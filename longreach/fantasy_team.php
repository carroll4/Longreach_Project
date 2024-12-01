<?php
include 'includes/connect.inc.php';
require_once 'includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Fantasy Page</title>
        <script>
            //create function for calculating all selected players points
            function f1() {
            var dd1 = document.getElementById("dropdown1");
            var dd2 = document.getElementById("dropdown2");
            var dd3 = document.getElementById("dropdown3");
            var dd4 = document.getElementById("dropdown4");
            var dd5 = document.getElementById("dropdown5");

            var team_total = Number(dd1.value) + Number(dd2.value) + Number(dd3.value) + Number(dd4.value) + Number(dd5.value) ;
            var s = document.getElementById("team_total");
            
            s.innerHTML = String(team_total);

            // Retrieve the IDs of the selected players for each dropdown
            var player1ID = dd1.options[dd1.selectedIndex].getAttribute("name");
            var player2ID = dd2.options[dd2.selectedIndex].getAttribute("name");
            var player3ID = dd3.options[dd3.selectedIndex].getAttribute("name");
            var player4ID = dd4.options[dd4.selectedIndex].getAttribute("name");
            var player5ID = dd5.options[dd5.selectedIndex].getAttribute("name");

            // Set the hidden input fields with player IDs
            document.getElementById("player1ID").value = player1ID;
            document.getElementById("player2ID").value = player2ID;
            document.getElementById("player3ID").value = player3ID;
            document.getElementById("player4ID").value = player4ID;
            document.getElementById("player5ID").value = player5ID;

            // Display the player IDs in the HTML
            var playerIDs = "Player 1 ID: " + player1ID + "<br>" +
                            "Player 2 ID: " + player2ID + "<br>" +
                            "Player 3 ID: " + player3ID + "<br>" +
                            "Player 4 ID: " + player4ID + "<br>" +
                            "Player 5 ID: " + player5ID;

            var idDisplay = document.getElementById("playerIDs");
            idDisplay.innerHTML = playerIDs;
                
            }
         
        </script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
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
                <button class="buttons fantasy"><b>Fantasy Team</b></button>
                <button class="buttons team" onclick="location.href='help.php'"><b>Help Page</b></button>
            </div></div>

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
            <?php
            // Ensure the user is logged in
            if (!isset($_SESSION['user_id'])) {
                header("Location: log_in.php");
                exit();
            }

            // Get the user ID
            $user_id = $_SESSION['user_id'];

            // Query to fetch the user's team details from the `team_db` table
            $query = "SELECT * FROM `team_db` WHERE user_id = '$user_id' ORDER BY team_id DESC LIMIT 1"; // Assuming `team_id` is the primary key
            $result = mysqli_query($conn, $query);

            // If a team is found for the user
            if ($row = mysqli_fetch_assoc($result)) {
                // Retrieve player IDs
                $player1ID = $row['player_1'];
                $player2ID = $row['player_2'];
                $player3ID = $row['player_3'];
                $player4ID = $row['player_4'];
                $player5ID = $row['player_5'];
                $teamTotal = $row['team_total'];

                // Query to get the player names and points
                $playersQuery = "SELECT * FROM `players` WHERE ID IN ($player1ID, $player2ID, $player3ID, $player4ID, $player5ID)";
                $playersResult = mysqli_query($conn, $playersQuery);

                // Display team info
                echo "<h2>Your Fantasy Team</h2>";
                echo "<table>";
                echo "<tr><th>Player Name</th><th>Points</th></tr>";
                
                while ($player = mysqli_fetch_assoc($playersResult)) {
                    echo "<tr>";
                    echo "<td>" . $player['Name'] . "</td>";
                    echo "<td>" . $player['Points'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "<h3>Total Team Points: " . $teamTotal . "</h3>"; ?>

                
                <button class="buttons join" onclick="location.href='edit_team.php'"><b>Edit Team</b></button>
                <?php
                

            } else { // Show dropdown options for users to create a team if not already 
                echo "<h2>You have not selected a team yet.</h2>";
                echo "<p>Please create and save your team first.</p>"; ?>

<script>
                function checkDuplicatePlayers() {
                    var selectedPlayers = [];
                    
                    // Get selected players from the dropdowns
                    selectedPlayers.push(document.getElementById('dropdown1').value);
                    selectedPlayers.push(document.getElementById('dropdown2').value);
                    selectedPlayers.push(document.getElementById('dropdown3').value);
                    selectedPlayers.push(document.getElementById('dropdown4').value);
                    selectedPlayers.push(document.getElementById('dropdown5').value);
                    
                    // Check for duplicates in the array
                    var uniquePlayers = [...new Set(selectedPlayers)];
                    
                    if (uniquePlayers.length !== selectedPlayers.length) {
                        alert('You cannot select the same player multiple times.');
                        return false; // Prevent form submission
                    }
                    
                    return true; // Allow form submission
                }
            </script>
                    <h2><u>My Team:</u></h2>
                    <form method="POST" action="includes/save_team.inc.php" onsubmit="return checkDuplicatePlayers()">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
                        <label for="team_name">Team Name:</label><br>
                        <input type="text" id="team_name" name="team_name" placeholder="Enter Team Name"><br>

                        <label>Player 1:</label>
                        <select id="dropdown1" onchange="f1()">
                            <?php
                            // Get players from database for user to select from
                            $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                            while($c = mysqli_fetch_array($players)) {
                            ?>
                            <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="player1ID" id="player1ID">

                        <label>Player 2:</label>
                        <select id="dropdown2" onchange="f1()">
                            <?php
                            $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                            while($c = mysqli_fetch_array($players)) {
                            ?>
                            <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="player2ID" id="player2ID">

                        <label>Player 3:</label>
                        <select id="dropdown3" onchange="f1()">
                            <?php
                            $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                            while($c = mysqli_fetch_array($players)) {
                            ?>
                            <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="player3ID" id="player3ID">

                        <label>Player 4:</label>
                        <select id="dropdown4" onchange="f1()">
                            <?php
                            $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                            while($c = mysqli_fetch_array($players)) {
                            ?>
                            <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="player4ID" id="player4ID">

                        <label>Player 5:</label>
                        <select id="dropdown5" onchange="f1()">
                            <?php
                            $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                            while($c = mysqli_fetch_array($players)) {
                            ?>
                            <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="player5ID" id="player5ID">

                        <h2>Team Total Points: <div id="team_total" type="text"></h2><br>

                        <?php if (isset($_SESSION["user_id"])) { ?>  
                        <input class="buttons join" type="submit" value="Submit">
                        <?php } ?>

                    </form>
            <?php }?>  
                    

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
