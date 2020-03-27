<?php

session_start();
if (!isset($_SESSION["uname"])) {
    header('location:index.php');
  }
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

<link rel="stylesheet" type="text/css" href="profile.css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet"/>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="dp/<?php echo $row['dp']; ?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $row['fname']; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $row['uname']; ?>
                                    </h6>
                                    <h6>Age:
                                        <?php echo $row['age']; ?>
                                    </h6>
                                    <i class="glyphicon glyphicon-log-out"></i><a href="logout.php">
                                        Logout
                                    </a>
                            <ul class="nav nav-tabs" id="myTab" role="tablist"><br/>
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#about" role="tab" aria-controls="home" aria-selected="true">Groups</a>
                                </li>
                            </ul>
                            <ul>
                            <?php
                                    $group="SELECT gname FROM profile WHERE uname='$uname'";
                                    $group_result=mysqli_query($con,$group) or die(mysqli_error($con));
                                    while ($row2=mysqli_fetch_assoc($group_result)) {
                                        echo '<a href="#">'.$row2['gname'].'</a><br/>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p></p>
                            <a href="main.php">Home</a><br/>
                            <a href="bio.php">Add a bio</a><br/>
                            <p>Contact Information</p>
                            <!--<a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>-->
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                           
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
        </div>

</body>
</html>