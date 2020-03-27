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

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet"/>

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
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 52px;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav u{
  padding: 6px 8px 6px 16px;
  font-size: 24px;
  color: #818181;
  display: block;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>


<!--header-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-radius: 0px;">
  <a class="navbar-brand" href="#">Private Space</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
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
</nav>

<form method="post" action="post.php" enctype="multipart/form-data">
<div class="form-group" style="margin-left: 12%;">
    <label for=""></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="caption" rows="3" placeholder="Hey what's on your mind?"></textarea>
    <input type="file" name="img" id="img" class="form-control input-lg" placeholder="Insert Image" required>
</div>
<button type="submit" class="btn btn-primary" style="float: right;">Share</button>
</form>


<div class="post" style="padding:100px;margin-left:300px; z-index: 1000;">
  <?php 
    $friendquery="SELECT friend FROM friends WHERE uname='$uname'";
    $result1=mysqli_query($con,$friendquery) or die(mysqli_error($con));
    while($row1 = mysqli_fetch_assoc($result1))
    {
      $friend=$row1['friend'];
      $postquery="SELECT * FROM post WHERE uname='$friend' ";
      $result11=mysqli_query($con,$postquery) or die(mysqli_error($con));
      while($row11 = mysqli_fetch_assoc($result11))
    {


    ?>  
      <h2><a href="#"><?php echo $row11['uname']; ?></a></h2>
      <a href="#" ><img src="post/<?php echo $row11['img']; ?>" style="width: 500px;height: 500px;"></a>
        <legend> <?php echo $row11['caption']; ?></legend><br><br>
    <?php

    }
    }

   ?>


</div>

<!--Sidebar-->
<div class="sidenav">
  <u>Your groups</u>
  <a href="#">Doctype</a>
  <a href="#">Another group name</a>
  <a href="#">Another group name</a>
  <a href="#">Another group name</a>
</div>

</body>
</html>

