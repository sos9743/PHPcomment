<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
 
<body>
<?php
session_start();

if(isset($_SESSION["post_name"]))
{$DBHOST = "localhost";
 $DBUSER = "root";
 $DBPWD = "";
 $DBNAME = "guestbook";
 

 $conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);
 

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 }
 
 
$time = date("Y-m-d h:i:sa");
$username = $_SESSION["post_name"];

$email = $_SESSION["post_email"];
$location = $_SESSION["post_location"];
$message = $_SESSION["post_message"];
/*stores data sent to it*/

 $statement = "INSERT INTO post(time, username, email, location, message) VALUES(?, ?, ?, ?, ?)";
 $stmt = $conn->prepare($statement);
 
 $stmt->bind_param("sssss", $time, $username, $email, $location, $message);
 $stmt->execute();
$stmt->close();
$conn->close();
header("Location:display_post.php");
}
else
{
header("Location:display_post.php");
}/*prevents direct access by user*/
?>

</body>
</html>