<?php
session_start();
$con=mysqli_connect("localhost","root","","ps");
$gname=$_POST['gname'];
$tmp_name=$_SESSION['fname'];
$id="SELECT id FROM signup WHERE fname='$tmp_name';";
$id_result=mysqli_query($con,$id) or die(mysqli_error($con));
$duplicate="SELECT * FROM profile WHERE gname='$gname' AND id='$id_result';";
$duplicate_result=mysqli_query($con,$duplicate) or die(mysqli_error($con));
if(mysqli_num_rows($duplicate_result)==1){
	echo "Group name already taken!";
	header('Location:insert.php');
}
else{
	$sql="INSERT INTO profile(gname) VALUES('$gname')";
	$sql_result=mysqli_query($con,$sql);
	header("Location:main.php");
}
?>