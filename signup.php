<?php
session_start();
$con=mysqli_connect("localhost","root","","ps") or die(mysqli_error($con));
$fname=$_POST['fname'];
$uname=$_POST['uname'];
$email=$_POST['email'];
$pwd=$_POST['password'];
$cpwd=$_POST['password'];
$age=$_POST['age'];
$dp=$_FILES['dp']['name'];
$loc="dp/".$dp;

$duplicate="SELECT * FROM signup WHERE uname='$uname'";
$duplicate_result=mysqli_query($con,$duplicate);
if(mysqli_num_rows($duplicate_result)==1){
	echo "<h2>Username already exists!!</h2>";
	header('Location:index.html');
}
else{
if(strcmp($pwd,$cpwd)==0){
	$query="INSERT INTO signup(fname,uname,email,password,age,dp) VALUES('$fname','$uname','$email','$pwd','$age','$dp');";
	$query_result=mysqli_query($con,$query) or die(mysqli_error($con));
	move_uploaded_file($_FILES['dp']['tmp_name'],$loc);
	header('Location:insert.php');
}
else{
	echo '<script type="text/javascript">
		alert("Your passwords dont match!");
	</script>';
	header('Location:index.html');
}
}
$_SESSION["uname"]=$uname;
?>
