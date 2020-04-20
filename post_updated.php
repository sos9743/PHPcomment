<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
	
	</style>
<body>
<?php
session_start();

if(isset($_SESSION["post_message"]) && isset($_GET["post_id"]))
{
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "guestbook";
$message = $_SESSION["post_message"];
$post_id = $_GET["post_id"];
$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$statement = "UPDATE post SET message=? WHERE post_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("si", $message, $post_id);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location:display_post.php");
}/*updates message and sends back to display_post with changed message*/
else
{
header("Location:display_post.php");
}/*prevents direct access of URL*/
?>



</body>
</html>