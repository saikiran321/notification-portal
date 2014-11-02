
<script type="text/javascript" src=" http://code.jquery.com/jquery-2.1.0.min.js"></script>
<?php 
session_start();
?>

<?php
require '../config.php';
$user_id=$_SESSION['user_id'];
$sql1="SELECT * FROM `subscribe` WHERE `user_id`=$user_id";
echo $sql1; 
$query1=mysqli_query($con,$sql1);
$result=mysqli_fetch_array($query1,MYSQLI_BOTH);
$s=rtrim($result['executive'],'|');
$array = explode('|', $s);
print_r($array);
require '../includes/functions.php';
mysqli_close($con);
?>
<h1> <?php  if($array){inarray('webops',$array);}  ?></h1>

<div id="container">
<form  action="profile.php" method="post">
CFI
<input type="checkbox" id="cfi" name="vote[]" value="cfi"   <?php  inarray('cfi',$array);  ?> >
<br>T5
<input type="checkbox" name="vote[]" value="t5"     <?php inarray('t5',$array);  ?>  >
<br>webops
<input type="checkbox" name="vote[]" value="webops"    <?php  inarray('webops',$array);  ?>  >
<input type="submit" class="submit" style="">
</form>
</div>
	
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
}

?>


 

