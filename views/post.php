<?php
session_start();
require '../includes/functions.php';
if(!is_executive())
	{
	header("Location:../index.php");
	}

?>	

<h2>POST NOTIFICATION</h2>
<form action="../includes/_post.php" method="post">
Description:<input type="text" name="description">
</br>
Content:<input type="text" name="content">
<input type="submit">
</form>