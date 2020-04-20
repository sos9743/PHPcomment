<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<?php


	
if(isset($_POST["reply_id"]) && isset($_POST["reply_message"]) && $_POST["reply_message"]!="")
{	

echo "<img src='gb_logo.png' id='logo'>";
echo "<br>"; 
	
session_start(); 
echo "Are you sure you want to update this reply?";
$_SESSION["reply_message"] = $_POST["reply_message"];
$_SESSION["post_id"] = $_POST["post_id"];
$_SESSION["reply_id"] = $_POST["reply_id"];

 
$reply_updated = "reply_updated.php";


echo "<br>";
echo "<br>";
echo "<a href='$reply_updated'>Yes</a>";
echo "&nbsp";
echo "<a href='display_post.php'>No</a>";
}

else if(isset($_POST["reply_id"]) && isset($_POST["reply_message"]) && $_POST["reply_message"]=="")
{

	$value= "incomplete";
	$reply_id = $_POST["reply_id"];
	$post_id =  $_POST["post_id"];
	
	header("Location:update_reply.php?message=$value&reply_id=$reply_id&post_id=$post_id"); 

}/*make sure all fields are filled in*/

else
{
header("Location:display_post.php");	
}/*prevent direct acccess by user */

?>

</body>
</html>