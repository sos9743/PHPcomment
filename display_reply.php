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
echo "<b>Please fill in all fields</b>";
echo "<br>";
echo "<br>";
}
}/*displays different text depending on context */

echo "<br>";
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "guestbook";

 $conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);	

 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 $statement = "SELECT * FROM post WHERE post_id=?";
 $stmt = $conn->prepare($statement);
 $post_id = $_GET["post_id"];
 $stmt->bind_param("d", $post_id);
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

 }
/*displays the relevant post */

$statement = "SELECT * FROM reply WHERE post_id=?";
$stmt = $conn->prepare($statement);
$post_id = $_GET["post_id"];
$stmt->bind_param("d", $post_id);
$stmt->execute();
$result = $stmt->get_result();

/*gets the corresponding replies from reply table */

 while($row = $result->fetch_assoc())
 {
	echo "<br>"; 

 $reply_id = $row["reply_id"];

 $delete_reply = "verify_delete_reply.php?reply_id=";
 $reply_id = $row["reply_id"];
 $delete_reply .=$reply_id;
 echo "<a class='rdelete_reply' href='$delete_reply'>";
	 echo "Delete Reply";
	 echo "</a>";
 $update_reply = "update_reply.php?post_id=";
 $update_reply .=$post_id;
 $update_reply .="&";
 $update_reply .="reply_id=";
 $update_reply .=$reply_id;

 echo "<a  class='rupdate_reply' href='$update_reply'>";
	 echo "Update Reply";
	 echo "</a>";

 
echo "<br>";
echo "<br>";
 
 
 echo "<span class='r'>";
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
 
 }/*displays corresponding replies */
 
$stmt->close();
$conn->close();



echo "<div id='title'>Leave A Reply </div>";
 
echo "<form action='verify_add_reply.php ' method='POST'>";	

echo "<input type='hidden' value='$post_id' name='post_id'>";
	
echo "<label for='reply_name'>Name</label>";
echo "<input type='text' name='reply_name' class='name_input'/>";
 

echo "<br>";
 


 
echo "<label for='reply_email'> Email</label>";	
echo "<input type='text' name='reply_email'/>";
 
echo "<br>";

 
echo "<label for='reply_location'>	Location</label>";
echo "<input type='text' name='reply_location'/>";
 
echo "<br>";



echo "<label for='reply_message'> Message</label>";
echo "<input type='text' id='message' name='reply_message'/>";
 
echo "<br>";

echo "<input type='submit' value='Reply' class='submit'>"; 
echo "</form>";
 
 
}
 

else
{
header("Location:display_post.php");
}/*prevents direct access of url*/
 
	?>
 

</body>
</html>
