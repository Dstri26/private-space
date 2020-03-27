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
    <link rel="icon" href="logo.png" type="image/icon type">
	<title>Private Space</title>
  <!--stylesheets-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">

    <script src="jquery/jquery.min.js"></script>
    <!---- jquery link local dont forget to place this in first than other script or link or may not work ---->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!---- boostrap.min link local ----->
    
    <link rel="stylesheet" href="css/style.css">
    <!---- boostrap.min link local ----->

    <script src="js/bootstrap.min.js"></script>
    <!---- Boostrap js link local ----->
    
    <link rel="icon" href="images/icon.png" type="image/x-icon" />
    <!---- Icon link local ----->
    
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <!---- Font awesom link local ----->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Private Space</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="insert.php">Create Another Group</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
      	<a class="nav-link" href="profile.php" style="float: right;"><img src="dp/<?php echo $row['dp']; ?>" style="width: 20px;height: 20px;border-radius: 50%;"><span> <?php echo $uname; ?></span></a>
    </li>
    </ul>
  </div>
</nav><br><br><br><br>

<form>
	<div class="form-group">
	    <label for="status"></label>
	    <textarea style="width: 70%;" class="form-control" id="status" name="status" rows="3" placeholder="Hey what's on your mind?"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Share</button>
</form>
