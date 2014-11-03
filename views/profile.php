
<?php 
session_start();
if(!$_SESSION)
{
	header("Location:../");
}
?>


 <?php  

require '../config.php';
$user_id=$_SESSION['user_id'];
$sql1="SELECT * FROM `subscribe` WHERE `user_id`=$user_id";
//echo $sql1; 
$query1=mysqli_query($con,$sql1);
$result=mysqli_fetch_array($query1,MYSQLI_BOTH);
$s=rtrim($result['executive'],'|');
$array = explode('|', $s);

require '../includes/functions.php';
?>
<div id="container">
<form  action="_profile.php" method="post">
CFI
<input type="checkbox" id="cfi" name="vote[]" value="cfi"  <?php  if($array){inarray('cfi',$array);} ?> >
<br>T5
<input type="checkbox"id="t5" name="vote[]" value="t5"   <?php  if($array){inarray('t5',$array);} ?>  >
<br>webops
<input type="checkbox" id="webops" name="vote[]" value="webops" <?php  if($array){inarray('webops',$array);} ?> >
<input type="submit" class="submit" style="">
</form>
</div>
