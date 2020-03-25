<?php
session_start();
$con=mysqli_connect("localhost","root","","ps");
$gname=$_POST['gname'];
$uname=$_SESSION['uname'];

$duplicate="SELECT * FROM profile WHERE uname='$uname' AND gname='$gname';";
$duplicate_result=mysqli_query($con,$duplicate) or die(mysqli_error($con));
if(mysqli_num_rows($duplicate_result)!=0){
	echo "Group name already taken!";
	header('Location:insert.php');
}
else{
	$sql="INSERT INTO profile(uname,gname) VALUES('$uname','$gname');";
	$sql_result=mysqli_query($con,$sql);
	header("Location:main.php");
}


?>