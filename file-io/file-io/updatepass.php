<!DOCTYPE html>
<html>
<head>
<title>Password Update</title>
</head>
<body>
<?php
define("filepath", "data.json");
$passwordnErr = $passwordoErr = "";  
$passwordn = $passwordo = ""; 
$passE = ""; 
$flag = false;
$successfulMessage = $errorMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {  

    if (empty($_POST["passwordo"])) 
    {  
        $passwordoErr = " Please fill the gap"; 
        $flag = True;
    } 
  
    if (empty($_POST["passwordn"])) 
    {  
        $passwordnErr = " Please fill the gap"; 
        $flag = True;
    } 
        

    if(!$flag) 
    {

    $passwordo = input_data($_POST["passwordo"]);
    $passwordn = input_data($_POST["passwordn"]);
    session_start();
    $username = "";
    if(isset($_SESSION['username'])) 
    {
    $username = $_SESSION['username'];
    }
    $fileData = read();
    $datas=json_decode($fileData);
    foreach($datas as $data)
    {
    if($data->username === $username && $data->password === $passwordo)
    {
    $data->password = $passwordn;
    $result = json_encode($datas);
    write("");
    $show = write($result);
        if($show) {
        $successfulMessage = "Successfully changed";
        }
    }
   }
  }
 }

function input_data($data) {  
$data = trim($data);  
$data = stripslashes($data);  
$data = htmlspecialchars($data);  
return $data;  
}
?>
<a href="Home.php">Go Back</a><br>
<h1>Password Update</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" novalidate enctype="application/x-www-form-urlencoded">
 <fieldset>
 <label for="passwordo">Enter Old Password:</label>
 <input type="password" id="passwordo" name="passwordo">
 <?php echo $passwordoErr; ?><br><br>
 <label for="passwordn">Enter New Password:</label>
 <input type="password" id="passwordn" name="passwordn">
 <?php echo $passwordnErr; ?>
 <br><br><input type="submit" value="Submit">
</fieldset>
</form>
 <br>
<?php echo "<b>".$successfulMessage."</b>"; ?>


<?php
function write($content) {
$file = fopen(filepath, "w");
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