<html>
<head><title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<style> 
	</style>
<body>

<?php
if(isset($_POST["post_id"]) && $_POST["post_id"]!="" && isset($_POST["reply_name"]) && $_POST["reply_name"] !="" && isset($_POST["reply_location"]) && $_POST["reply_location"] !=""  && isset($_POST["reply_email"])  && $_POST["reply_email"] !="" && isset($_POST["reply_message"]) && $_POST["reply_message"] !="")
{
echo "<img src='gb_logo.png' id='logo'>";
echo "<br>";
echo "Are you sure you want to add this reply?";
echo "<br>"; 
echo $_POST["reply_name"];
echo "<br>";
echo $_POST["reply_location"];
echo "<br>";
echo $_POST["reply_email"];
echo "<br>";
echo $_POST["reply_message"];

session_start();
$_SESSION["post_id"] = $_POST["post_id"];
$_SESSION["reply_name"] =$_POST["reply_name"];
$_SESSION["reply_location"] = $_POST["reply_location"];
$_SESSION["reply_email"] = $_POST["reply_email"];
$_SESSION["reply_message"] = $_POST["reply_message"];
$reply_added = "reply_added.php";
echo "<br>";
echo "<br>";
$display_post = "display_post.php";
echo "<a href='$reply_added'>Yes</a>";
echo "&nbsp";
echo "<a href='$display_post'>No</a>";
}



else if($_POST["reply_name"] =="" || $_POST["reply_location"] ==""  || $_POST["reply_email"] =="" || $_POST["reply_message"] =="")
{
$message = "incomplete";
$post_id = $_POST["post_id"];


header("Location:display_reply.php?message=$message&post_id=$post_id");

}

else if(!isset($_POST["reply_name"]) || !isset($_POST["reply_location"]) || !isset($_POST["reply_email"]) || !isset($_POST["reply_message"]))
{
	
header("Location:display_post.php");
}/*preventing direct access by user */

?>

</body>
</html>