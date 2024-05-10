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
<?php
$sql = "SELECT `Name`, `Goals`, `Assists`, `Games_Played`, `Points` FROM `players` ORDER BY `Goals` LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Goals</th><th>Assits</th><th>Games Played</th><th>Points</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Goals"]. "</td><td> " . $row["Assits"]. "</td><td>" . $row["Games_Played"]. "</td><td>" . $row["Points"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>