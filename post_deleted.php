<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<?php
if(isset($_GET["post_id"]))
{

$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "guestbook";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
$post_id = $_GET["post_id"];
$statement = "DELETE FROM post WHERE post_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("i", $post_id);
$stmt->execute();

$statement = "DELETE FROM reply WHERE post_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("i", $post_id);
$stmt->execute();
 $stmt->close();
$conn->close();
header("Location:display_post.php");
}

else
{ 
header("Location:display_post.php");
}/*prevents direct access of URL */
?>



</body>
</html>