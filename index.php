<?php
session_start();
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require 'views/signin.php';
echo "</br>";
?>
<?php
if($_SESSION)

{	
//	print_r($_SESSION);
	require 'includes/functions.php';
	echo '<a href="views/profile.php">Profile</a></br>';
	echo '<a href="notifications.php">Notifications</a></br>';
	if(is_executive())
	{ 
	echo '<a href="views/post.php">POST</a></br>';
	}
}

?>