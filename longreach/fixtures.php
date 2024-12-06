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
                <button class="buttons fixtures"><b>Fixtures & Results</b></button>
                <button class="buttons fantasy" onclick="location.href='fantasy_team.php'"><b>Fantasy Team</b></button>
                <button class="buttons team" onclick="location.href='help.php'"><b>Help Page</b></button>
            </div></div>

            <div class="mid">
                <h1 style="float: left; font-size: 110%;"><u>Longreach Firsts: Fixtures & Results</u></h1><h1 style="float: right; font-size: 110%;"><u>Longreach Reserves: Fixtures & Results</u></h1>
                <!--first teams api-->
                <div id="lrep705596635" style="width: 42%; float: left;">Data loading....<a href="https://fulltime.thefa.com/index.html?divisionseason=816016533">click here for Division 2</a><br/><br/>
                    <a href=http://www.thefa.com/FULL-TIME>FULL-TIME Home</a></div>
                    <script language="javascript" type="text/javascript">
                    var lrcode = '705596635'
                    </script>
                    <script language="Javascript" type="text/javascript" src="https://fulltime.thefa.com/client/api/cs1.js"></script>
                <!--second teams api-->
                <div id="lrep104745148" style="width: 42%; float: right;">Data loading....<a href="https://fulltime.thefa.com/index.html?divisionseason=237926781">click here for Division 3</a><br/><br/>
                    <a href=http://www.thefa.com/FULL-TIME>FULL-TIME Home</a></div>
                <script language="javascript" type="text/javascript">
                var lrcode = '104745148'
                </script>
                <script language="Javascript" type="text/javascript" src="https://fulltime.thefa.com/client/api/cs1.js"></script>
            </div>

            <div class="footer">
                <a href="https://www.instagram.com/longreach_afc/?hl=en-gb" target="_blank"><img src="Images/insta.jpg" style="float: right; width: 8vw; height: 8vw; padding: 2px;"></a>
                <a href="https://twitter.com/longreachutr" target="_blank"><img src="Images/twitter.png" style="float: right; width: 8vw; height: 8vw; padding: 2px;"></a>
                <br>
                <p id="footer_p"><b>Copy Right | Privacy Notice | Terms of Use</b></p>
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
