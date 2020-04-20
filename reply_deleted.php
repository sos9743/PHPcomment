<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
 
<body>
<?php
if(isset($_GET["reply_id"]))
{
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "guestbook";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$reply_id = $_GET["reply_id"];

$statement = "DELETE FROM reply WHERE reply_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("i", $reply_id);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location:display_post.php");
}/*deletes reply from REPLY table */
else
{
header("Location:display_post.php");
}/*prevent direct access from URL */
?>



</body>
</html>