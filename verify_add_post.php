<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php


if(isset($_POST["post_name"]) && $_POST["post_name"]!="" && isset($_POST["post_email"]) && $_POST["post_email"]!="" && isset($_POST["post_location"]) && $_POST["post_location"]!="" && isset($_POST["post_message"]) && $_POST["post_message"]!="")
{
	echo "<img src='gb_logo.png' id='logo'>";
	echo "<br>";
	echo "Are you sure you want to add this post?";
	
echo "<br>"; 
echo $_POST["post_name"];
echo "<br>";

echo $_POST["post_email"];
echo "<br>";
echo $_POST["post_location"];
echo "<br>";
echo $_POST["post_message"];
	
session_start();
	
$_SESSION["post_name"] = $_POST["post_name"];


 
$_SESSION["post_email"] = $_POST["post_email"];

$_SESSION["post_location"] = $_POST["post_location"];

$_SESSION["post_message"] = $_POST["post_message"];

 
 
$post_updated = "post_added.php";


echo "<br>";
echo "<br>";
echo "<a href='$post_updated'>Yes</a>";
echo "&nbsp";
echo "<a href='display_post.php'>No</a>";
}






else if(!isset($_POST["post_name"]) || !isset($_POST["post_email"])  || !isset($_POST["post_location"]) || !isset($_POST["post_message"]))
{
	
header("Location:display_post.php");	
}/*prevent direct access by user*/

else if($_POST["post_name"]=="" || $_POST["post_email"]=="" || $_POST["post_location"]==""|| $_POST["post_message"] =="")
{
$value = "incomplete";	
header("Location:display_post.php?field=$value");
}/*make sure all fields are filled in */

?> 

</body>
</html>