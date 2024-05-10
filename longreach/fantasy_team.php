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
<html lang="en">
    <head>
        <title>Fantasy Page</title>
        <script>
            function f1() {
            var dd1 = document.getElementById("dropdown1");
            var dd2 = document.getElementById("dropdown2");
            var dd3 = document.getElementById("dropdown3");
            var dd4 = document.getElementById("dropdown4");
            var dd5 = document.getElementById("dropdown5");

            var sum = Number(dd1.value) + Number(dd2.value) + Number(dd3.value) + Number(dd4.value) + Number(dd5.value) ;
            var s = document.getElementById("sum");

            s.innerHTML = String(sum);
            }
        </script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <div class="grid-container">
            <div class="logo">
                <img src="Images/logo.jpg" style="float: left; width: 14%; height: auto;">
                <img src="Images/logo.jpg" style="float: right; width: 14%; height: auto;">
                <h1 id="title">Longreach Athletic FC</h1>
            </div>
            
            <div class="nav"><div class="btn-group">
                <button class="buttons home" onclick="location.href='home.php'"><b>Home</b></button>
                <button class="buttons fixtures" onclick="location.href='fixtures.html'"><b>Fixtures & Results</b></button>
                <button class="buttons fantasy"><b>Fantasy Team</b></button>
                <button class="buttons team" onclick="location.href='help.html'"><b>Help Page</b></button>
            </div></div>

            <div class="mid">
                <h2>To create your own UTR fantasy Team please click the log-in button below! </h2>
                <button class="buttons join" onclick="location.href='log_in.html'"><b>Log in</b></button>
                <br>
                <p><b>Team will consist of 5 Players of your choice.
                     Each player will score their own points based on how they preform throught the season.
                    Infomation on how points will be scored can be found on the help page.</b></p>
            </div>

            <div class="lower">
                <h2><u>My team:</u></h2>
                <form>
                    <label>Player 1:</label>
                    <select id="dropdown1" onchange="f1()">
                    <?php
                        $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                        while($c = mysqli_fetch_array($players)) {
                        ?>
                        <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                        <?php } ?>
                    </select>
                
                    <label>Player 2:</label>
                    <select id = "dropdown2" onchange="f1()">
                        <?php
                        $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                        while($c = mysqli_fetch_array($players)) {
                        ?>
                        <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                        <?php } ?>
                    </select>

                    <br><br>

                    <label>Player 3:</label>
                    <select id = "dropdown3" onchange="f1()">
                        <?php
                        $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                        while($c = mysqli_fetch_array($players)) {
                        ?>
                        <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                        <?php } ?>
                    </select>

                    <label>Player 4:</label>
                    <select id = "dropdown4" onchange="f1()">
                        <?php
                        $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                        while($c = mysqli_fetch_array($players)) {
                        ?>
                        <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                        <?php } ?>
                    </select>

                    <br><br>

                    <label>Player 5:</label>
                    <select id = "dropdown5" onchange="f1()">
                        <?php
                        $players = mysqli_query($conn, "SELECT * FROM `players` WHERE 1");
                        while($c = mysqli_fetch_array($players)) {
                        ?>
                        <option name="<?php echo $c['ID']?>" value="<?php echo $c['Points']?>"><?php echo $c['Name'] ?>  Points:<?php echo $c['Points']?></option>
                        <?php } ?>
                    </select>
        
                    <h2>Team Total Points: <div id="sum" type="text"></h2><br>
                    <input class="buttons join" type="submit" value="Submit">

                </form>

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
