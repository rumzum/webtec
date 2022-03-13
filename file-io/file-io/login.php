<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<?php 
$usernameErr = $passwordErr = "";
$login = "";
$flag = false;
define("filepath", "data.json");
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 


if (empty($_POST["username"])) 
    {  
       $usernameErr = " Please fill the gap";
       $flag = True;  
    } 

if (empty($_POST["password"])) 
    {  
       $passwordErr = " Please fill the gap";
       $flag = True;  
    } 
 
if(!$flag) 
    {

    $username = input_data($_POST["username"]);
    $password = input_data($_POST["password"]); 
    $fileData = read();
    $users=json_decode($fileData);
	foreach($users as $user)
	{
    //Searching deatails
	if($user->username === $username && $user->password === $password)
	$flag = true;
	}
    if($flag)
    {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: Home.php");
    }
    else 
    {
	$login =  "Wrong user information";
    }
    }
}
function input_data($data) 
{  
$data = trim($data);  
$data = stripslashes($data);  
$data = htmlspecialchars($data);  
return $data;  
}

?>
<a href="registration.php">Create New Account</a>
<br>
<h1>Login</h1><br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" novalidate enctype="application/x-www-form-urlencoded">
<fieldset><label for="username">User Name:</label>
<input type="text" name="username" id="username" >
<?php echo $usernameErr; ?> <br><br>
<label for="password">Password:</label>
<input type="password" name="password" id="password" >
<?php echo $passwordErr; ?>
<?php echo $login; ?>  <br><br>
<input type="submit" name="submit" value="Login">
</fieldset>
</form>
<br>


<?php
function write($content) {
$file = fopen(filepath, "w+");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}
function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>
</body>
</html>