<?php
session_start();
require '../config.php';
print_r($_POST);
$content=$_POST['content'];
$description=$_POST['description'];
$user_id=$_SESSION['user_id'];
$sql="INSERT INTO `posts`( `content`, `description`, `user_id`,`date_time`) VALUES ('$content','$description','$user_id',CURRENT_TIMESTAMP)";
echo $sql;
$query=mysqli_query($con,$sql);
mysqli_close($con);


?>