<?php
session_start();

require 'config.php';
if(!$_SESSION)
{
require 'views/signin.php';
}

else
	//print_r($_SESSION);

echo "</br>";
?>
<?php
if($_SESSION)
{
?>
<a href="includes/logout.php">logout</a>

<?php
}
require 'includes/functions.php';

if(is_executive())
{
	require 'views/post.php';
}

?>