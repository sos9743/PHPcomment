<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php
echo "<img src='gb_logo.png' id='logo'>";
if(isset($_GET["reply_id"]))
{
if(isset($_GET["message"]))
{
if($_GET["message"] == "incomplete")
{
echo "<b>Please fill in message to update</b>";
echo "<br>";
echo "<br>";
}
}/*display message if fields not filled in */
	
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "guestbook";
$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if(isset($_GET["post_id"]))
{
$post_id= $_GET["post_id"];
}
if(isset($_GET["reply_id"]))
{
$reply_id=$_GET["reply_id"];
}

$statement = "SELECT * FROM post WHERE post_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $post_id);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc())
{
 
echo "<span class='time'>";
echo $row["time"];
echo "</span>";

echo "<span class='p'>";
echo $row["username"];
echo "</span>";
	
echo "<span class='p'>";
echo $row["location"];
echo "</span>";

echo "<span class='p'>";
echo $row["email"];
echo "</span>";

echo "<span class='p'>";
echo $row["message"];
echo "</span>";

}/*display post of reply */

$statement = "SELECT * FROM reply WHERE reply_id=?";
$stmt = $conn->prepare($statement);
$reply_id = $_GET["reply_id"];
$stmt->bind_param("s", $reply_id);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc())
{
echo "<span class='rtime'>";
	echo $row["time"];
	echo "</span>";
echo "<span class='r'>";
echo $row["username"];
echo "</span>";

echo "<span class='r'>";
echo $row["location"];
echo "</span>";
echo "<span class='r'>";
echo $row["email"];
echo "</span>";
echo "<span class='r'>";
echo $row["message"];
echo "</span>";
}/*display reply to access */

$stmt->close();
$conn->close();

 echo "<div id='title'>Update Your Reply </div>";
 
 echo "<form action='verify_update_reply.php' method='POST'>";	

echo "<input type='hidden' name='post_id' value='$post_id'>";
echo "<input type='hidden' name='reply_id' value='$reply_id'>";

echo "<label for='reply_message'> Reply:</label>";
echo "<input type='text' name='reply_message'/>";
 
 
 echo "<input type='submit' value='Reply'/>";
 echo "</form>";
 }

else
 {

header("Location:display_post.php");
 }/*preventing direct access */

?>



</body>
</html>