<?php
session_start();
echo "<script>
alert('Welcome to your own Private Space!');
</script>";
?>
<?php
echo $_SESSION["fname"];
?>