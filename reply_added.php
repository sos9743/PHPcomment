<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<?php
session_start();
if(isset($_SESSION["post_id"])) 
{ 
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "guestbook";


$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);	

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$post_id = $_SESSION["post_id"];
$time = date("Y-m-d h:i:sa");
$username = $_SESSION["reply_name"];

$email = $_SESSION["reply_email"];
$message = $_SESSION["reply_message"];
$location = $_SESSION["reply_location"];



$statement = "INSERT INTO reply(post_id, time, username, location, email, message) VALUES(?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($statement);

$stmt->bind_param("ssssss", $post_id, $time, $username, $location, $email, $message);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location:display_post.php");
}
/*adds reply to reply table */

else
{
header("Location:display_post.php");
}

?>

</body>
</html>