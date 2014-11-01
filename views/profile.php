<?php 
session_start();
?>
<form  action="profile.php" method="post">
CFI
<input type="checkbox" name="vote[]" value="cfi"  >
<br>T5
<input type="checkbox" name="vote[]" value="t5"  >
<br>webops
<input type="checkbox" name="vote[]" value="webops"  >
<input type="submit" class="submit" style="">
</form>


<script type="text/javascript" src=" http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script>
function getVote()
{
	$('.submit').click();
}


</script>
<?php
require '../config.php';
$exec_data="";
foreach($_POST['vote'] as $key) 
{

	$exec_data.=$key."|";
}

echo $exec_data;
$user_id=$_SESSION['user_id'];
$sql="INSERT INTO `subscribe`( `executive`, `user_id`) VALUES ('$exec_data','$user_id')";
echo $sql;
$query=mysqli_query($con,$sql);
if ($query)
	{echo "sucess";}
mysqli_close($con);
/*$sql="INSERT INTO `subscribe`(`executive_subscription`,`user_id`) VALUES('$exec_data','$_SESSION['user_id']')";
$query=mysqli_query($con,$sql);
if($query)
{
	echo "sucess";
}
else
	echo "fail";*/
?>