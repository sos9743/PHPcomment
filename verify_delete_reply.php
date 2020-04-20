<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<?php
if(isset($_GET["reply_id"]))
{
echo "<img src='gb_logo.png' id='logo'>";
echo "<br>";
echo "Are you sure you want to delete this reply?";

$reply_id = $_GET["reply_id"];
$delete_reply = "reply_deleted.php?reply_id=";
$delete_reply .=$reply_id;
 
echo "<br>";
echo "<br>";
echo "<a href='$delete_reply'>Yes</a>";
echo "&nbsp";
echo "<a href='display_post.php'>No</a>";
}
else
{
header("Location:display_post.php");
}/*prevents direct access by user */
?>
</body>
</html>