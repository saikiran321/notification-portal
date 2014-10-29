<?php
require 'config.php';
$sql="SELECT * FROM posts ORDER BY date_time DESC ";
$query=mysqli_query($con,$sql);
while($result=mysqli_fetch_array($query,MYSQLI_BOTH))
{
	echo "DESCRIPTIN:".$result['description'].'</br>';
	echo "CONTENT:".$result['content'].'</br>';
	echo "BY:".$result['user_id'].'</br>';
	echo '<hr>';

}

mysqli_close($con);



?>