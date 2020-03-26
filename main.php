<?php

session_start();
if (!isset($_SESSION["uname"])) {
		header('location:index.php');
	}

echo "<script>
alert('Welcome to your own Private Space!');
</script>";
?>
<?php
$uname=$_SESSION["uname"];
$con=mysqli_connect("localhost","root","","ps") or die(mysqli_error($con));
$dpquery="SELECT * FROM signup WHERE uname='$uname'";
$result=mysqli_query($con,$dpquery) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $uname ?></title>
</head>
<body>
	<img src="dp/<?php echo $row['dp']; ?>" style="width:50px;height: 50px; border-radius: 50%;">
	<h3><?php echo $row['fname']; ?></h3>
</body>
</html>

<br><br><br>
<a href="insert.php">Create Another Group</a><br><br><br>

<a href="logout.php">Logout</a><br><br><br>
