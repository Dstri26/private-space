<?php 
session_start();
$con=mysqli_connect("localhost","root","","ps") or die(mysqli_error($con));
$uname=$_SESSION['uname'];
$caption=$_POST['caption'];
$img=$_FILES['img']['name'];
echo $img;
$loc="post/".$img;

$query="INSERT INTO post VALUES('$uname','$img','$caption');";
$query_result=mysqli_query($con,$query) or die(mysqli_error($con));
move_uploaded_file($_FILES['img']['tmp_name'],$loc);
header('Location:main.php');
 ?>