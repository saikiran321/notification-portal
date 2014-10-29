<?php
function is_executive()
{
if($_SESSION)
	{
	if($_SESSION['user_id']==9626)
	{	return True;
		}
    else false;
	}
}
?>