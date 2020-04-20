<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
 
<body>
	
<?php 
echo "<img src='gb_logo.png' id='logo'>";
if(isset($_GET["post_id"]))
{
	
if(isset($_GET["message"]))
{
if($_GET["message"] == "incomplete")
{
echo "<b>Please fill in message to update</b>";
echo "<br>";
echo "<br>";
}
}/*displays message on the top*/

$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "guestbook";
$post_id= $_GET["post_id"]; 


$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);	

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 

$statement = "SELECT * FROM post WHERE post_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $post_id);
$stmt->execute();
$result = $stmt->get_result();
/*Goes and gets appropriate post */

while($row = $result->fetch_assoc())
{
 
 
 
echo "<span class='time'>";
echo $row["time"];
echo "</span>";
echo "<span class='p'>";
echo $row["username"];
echo "</span>";
;

echo "<span class='p'>";
echo $row["location"];
echo "</span>";

echo "<span class='p'>";
echo $row["email"];
echo "</span>";
echo "<span class='p'>";
echo $row["message"];
echo "</span>";

}
/*displays the appropriate post*/
$stmt->close();
$conn->close();

echo "<div id='title' style='text-align: left;'>Update Your Message </div>";
 
echo "<form action='verify_update_post.php' method='POST'>";	

echo "<input type='hidden' name='post_id' value='$post_id'>";
 

echo "<label for='post_message'>Message:</label>";
echo "<input type='text' name='post_message'/>";
echo "<input type='submit' value='Post'/>";
  
echo "</form>"; 
}

else
{
header("Location:display_post.php"); 
}/*prevents direct access of URL by user */

?>
</body>
</html>