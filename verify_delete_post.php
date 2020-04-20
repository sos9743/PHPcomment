<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<?php
if(isset($_GET["post_id"]))
{
echo "<img src='gb_logo.png' id='logo'>";
echo "<br>";
echo "Are you sure you want to delete this post?";
 
$post_id = $_GET["post_id"];

$delete_post = "post_deleted.php?post_id=";
$delete_post .=$post_id;
echo "<br>";
echo "<br>";
echo "<a href='$delete_post'>Yes</a>";
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