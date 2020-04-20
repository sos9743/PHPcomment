<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">

</head> 

<body>
<?php

session_start();
if(isset($_SESSION["reply_id"]))
{
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "guestbook";

$reply_id = $_SESSION["reply_id"];
$message = $_SESSION["reply_message"];
$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$statement = "UPDATE reply SET message=? WHERE reply_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("si", $message, $reply_id);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location:display_post.php");
}
else
{

header("Location: display_post.php");
}
?>



</body>
</html>