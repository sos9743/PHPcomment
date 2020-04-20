<html>
 
 
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
 
</head>
<body>
<?php

session_start();
if(isset($_SESSION["post_id"]))
{
$_SESSION = array();
session_destroy();
}/*erases any previous session data when you arrive */

$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "guestbook";
$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);	

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<img src='gb_logo.png' id='logo'>";

if(isset($_GET["field"]))
{
if($_GET["field"] =="incomplete")
{
echo "<b>Please fill in all fields</b>";
echo "<br>";
echo "<br>";
}
}/*displays text if entered incomplete post */



$statement = "SELECT * FROM post";
$result = $conn->query($statement);

/*selects the data from the POST table */
while($row = $result->fetch_assoc())
{
 

$delete_post = "verify_delete_post.php?post_id=";
$post_id = $row["post_id"];
$delete_post.=$post_id;
echo "<a class='delete_post'   href='$delete_post'>Delete Post</a>";
$update_post = "update_post.php?post_id=";
$post_id = $row["post_id"];
$update_post .=$post_id;
echo "<a class='update_post' href='$update_post'>Update Post</a>";
$display_reply = "display_reply.php?post_id=";
$post_id = $row["post_id"];
$display_reply .=$row["post_id"];
 
echo "<a class='display_reply' href='$display_reply'>Display Replies </a>";
echo "<span class='time'>";
echo $row["time"];
echo "</span>";
echo "<span class='post_row'>";
	echo $row["username"]; 
	echo "</span>";
echo "<span class='post_row'>";
	echo $row["location"];
echo "</span>";
echo "<span class='post_row'>";
	echo $row["email"]; 
	echo "</span>";
echo "<span class='post_row'>";
	echo $row["message"];
	echo "</span>";
echo "<br>";
}


$conn->close();	
/*displays the results you queried */
	?>
	<?php 

	echo "<span id='title'>Leave A Message </span>";
	 
	echo "<form action='verify_add_post.php' method='POST'>";	
	echo "<label for='post_name'>Name</label>";
	echo "<input type='text' name='post_name'/>";
 



	echo "<br>";

	echo "<label for='post_location'>Location</label>";
	echo "<input type='text' name='post_location'/>";


	echo "<br>";


	echo "<label for='post_email'>Email</label>";
	echo "<input type='text' name='post_email'/>";
	echo "<br>";

	echo "<label for='post_message'>Message</label>";
	echo "<input type='text' id='message' name='post_message'/>";
	echo "<br>";

	echo "<input type='submit' class='submit' value='Post'>";
 
	echo "</form>";
 
	?>
</body>
</html>