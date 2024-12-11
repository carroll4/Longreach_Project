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
                <button class="buttons fixtures"><b>Fixtures & Results</b></button>
                <button class="buttons fantasy" onclick="location.href='fantasy_team.php'"><b>Fantasy Team</b></button>
                <button class="buttons team" onclick="location.href='help.php'"><b>Help Page</b></button>
            </div></div>

            <div class="mid">
                <h1 style="float: left; font-size: 110%;"><u>Longreach Firsts: Fixtures & Results</u></h1><h1 style="float: right; font-size: 110%;"><u>Longreach Reserves: Fixtures & Results</u></h1>
                <!--first teams api-->
                <div id="lrep872776627" style="width: 42%; float: left;">Data loading....<a href="https://fulltime.thefa.com/index.html?divisionseason=281245713">click here for Division 2</a><br/><br/>
                    <a href="http://www.thefa.com/FULL-TIME">FULL-TIME Home</a></div>
                    <script language="javascript" type="text/javascript">
                    var lrcode = '872776627'
                    </script>
                    <script language="Javascript" type="text/javascript" src="https://fulltime.thefa.com/client/api/cs1.js"></script>
                <!--second teams api-->
                <div id="lrep630580359" style="width: 42%; float: right;">Data loading....<a href="https://fulltime.thefa.com/index.html?divisionseason=445761360">click here for Division 3</a><br/><br/><a href="http://www.thefa.com/FULL-TIME">FULL-TIME Home</a></div>
                    <script language="javascript" type="text/javascript">
                    var lrcode = '630580359'
                    </script>
                    <script language="Javascript" type="text/javascript" src="https://fulltime.thefa.com/client/api/cs1.js"></script> 
            </div>

            <?php 
            include_once 'footer.php';
            ?>

            <div class="left">
                <p></p>
            </div>

            <div class="right">
                <p></p>
            </div>

        </div>
    </body>
</html>
