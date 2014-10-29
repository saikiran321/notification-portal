<?php
if(!is_executive())
	{
	header("Location:../index.php");
	}

?>	
<form action="_post.php">
<input type="text" name="description">

<input type="text" name="content">


</form>