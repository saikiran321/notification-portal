<?php
if($_POST)
{
require '../config.php';
$exec_data="";
foreach($_POST['vote'] as $key) 
{

	$exec_data.=$key."|";
}

echo $exec_data;
$user_id=$_SESSION['user_id'];
$check_user="SELECT * FROM subscribe WHERE user_id='$user_id'";
//echo "</br>".$check_user."</br>";
$check_query=mysqli_query($con,$check_user);
if($check_query)
	{
	echo "</br>"."YdddES"."</br>";
	$sql="UPDATE `subscribe` SET `club`='',`executive`='$exec_data' WHERE `user_id`='$user_id'";
	echo $sql;
	$query=mysqli_query($con,$sql);
	if ($query)
		{echo "sucess";}

	}
else
	{

	$sql="INSERT INTO `subscribe`( `executive`, `user_id`) VALUES ('$exec_data','$user_id')";
	echo $sql;
	$query=mysqli_query($con,$sql);
	if ($query)
		{echo "sucess";}
	}
	mysqli_close($con);
	//header("Location:../views/profile.php");
}

?>