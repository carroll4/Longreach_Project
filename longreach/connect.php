<?php
$User_Name = $_POST['User_Name'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];

//Database connection
$conn = new mysqli('localhost','root','','longreach');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into users(User_Name, Email, Password)
      values(?, ?, ?)");
    $stmt->bind_param("sss",$User_Name, $Email, $Password);
    $stmt->execute();
    echo "registartion SUccessfully...";
    $stmt->close();
    $conn->close();
  }
?>
