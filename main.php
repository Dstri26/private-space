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
echo $_SESSION["uname"];

?>

<a href="insert.php">Create Another Group</a><br><br><br>

<a href="logout.php">Logout</a><br><br><br>
