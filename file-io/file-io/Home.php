<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<?php 
session_start();

$username = "";

if(isset($_SESSION['username'])) 
{
$username = $_SESSION['username'];
}
?>
<h1>Welcome, <?php echo $username; ?></h1>
<a href="updateprofile.php">Profile Update</a>
<a href="updatepass.php">Password Update</a>
</body>
</html>
