
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



foreach($_POST['vote'] as $key) 
{

	echo $key.'|';
}

?>