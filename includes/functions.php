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


function inarray($val,$array){
   foreach ($array as $value) {
   	
         if($val==$value){
         	echo "checked";}
	
       
   }
}
?>
