<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<?php
if(isset($_POST["post_id"]) && isset($_POST["post_message"]) && $_POST["post_message"]!="")
{	echo "<img src='gb_logo.png' id='logo'>";
	echo "<br>";
	echo "<br>";
echo "Are you sure you want to update this post?";
session_start();
$_SESSION["post_message"] = $_POST["post_message"];

$_SESSION["post_id"] = $_POST["post_id"];



$post_updated = "post_updated.php?post_id=";
$post_updated .= $_POST["post_id"];
echo "<br>";

echo "<br>";
echo "<a href='$post_updated'>Yes</a>";
echo "&nbsp";
echo "<a href='display_post.php'>No</a>";
}
else if(isset($_POST["post_id"]) && $_POST["post_message"]=="")
{
	$value= "incomplete";
	$post_id = $_POST["post_id"];
	header("Location:update_post.php?message=$value&post_id=$post_id"); 
}/*make sure all fields are filled in*/


else
{
header("Location:display_post.php");
}/*prevents direct access by user */
?>



</body>
</html>