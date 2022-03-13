<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Profile Update</title>
</head>
<body>
<?php
define("filepath", "data.json");
$fnameErr = $lnameErr = $genderErr = $dobErr = $religionErr = $preddressErr = $paraddressErr  =$phoneErr = "";  
$fname = $lname = $gender = $dob = $religion = $preddress = $paraddress  =$phone = "";  
$flag = false;
$successfulMessage = $errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    
    if (empty($_POST["fname"])) 
    {  
        $fnameErr = " Please fill the gap";
        $flag = True;  
    }
    if (empty($_POST["lname"])) 
    {  
        $lnameErr = " Please fill the gap";
        $flag = True;  
    }
    if (empty($_POST["gender"])) 
    {  
        $genderErr = "Please fill the gap";
        $flag = True;  
    }     
    if (empty($_POST["dob"])) 
    {  
        $dobErr = " Please fill the gap";
        $flag = True;  
    }  

    if (empty($_POST["religion"])) 
    {  
        $religionErr = " Please fill the gap";
        $flag = True;  
    } 
    if (empty($_POST["preddress"])) 
    {  
        $preddressErr = " Please fill the gap";
        $flag = True;  
    } 

    if (empty($_POST["paraddress"])) 
    {  
        $paraddressErr = " Please fill the gap";
        $flag = True;  
    } 

    if (empty($_POST["phone"])) 
    {  
        $phoneErr = " Please fill the gap";
        $flag = True;  
    } 

    if(!$flag) 
    {

    $fname = input_data($_POST["fname"]);
    $lname = input_data($_POST["lname"]);
    $gender = input_data($_POST["gender"]);
    $dob = input_data($_POST["dob"]);
    $religion = input_data($_POST["religion"]);
    $preddress = input_data($_POST["preddress"]);
    $paraddress = input_data($_POST["paraddress"]);
    $phone = input_data($_POST["phone"]);
      
    session_start();
    $username = "";
    if(isset($_SESSION['username'])) 
    {
    $username = $_SESSION['username'];
    }
    $fileData = read();
    $users=json_decode($fileData);
    foreach($users as $user)
    {
    if($user->username == $username )
    {
    $user->fname = $fname;
    $user->lname = $lname;
    $user->gender = $gender;
    $user->dob = $dob;
    $user->religion = $religion;
    $user->preddress = $preddress;
    $user->paraddress = $paraddress;
    $user->phone = $phone;
    $data = json_encode($users);
    write("");
    $res = write($data);
        if($res) {
        $successfulMessage = "Profile Updated";
        }
        else {
        $errorMessage = "There must be an error.";
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
<h1>Profile Update</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" novalidate enctype="application/x-www-form-urlencoded">
  <fieldset>
    <label for="fname">Enter your First name:</label>
    <input type="text" id="fname" name="fname">
    <?php echo $fnameErr; ?>  <br><br>
    <label for="lname">Enter your Last name:</label>
    <input type="text" id="lname" name="lname">
    <?php echo $lnameErr; ?>  <br><br>
    <label for="gender">Gender :</label>
    <input type="radio" name="gender"value="Male">
    <label for="Male">Male</label>
    <input type="radio" name="gender"value="Female">
    <label for="Female">Female</label>
    <input type="radio" name="gender"value="Others">
    <label for="Others">Others</label>
    <br>
    <?php echo $genderErr; ?><br><br>
    <label for="DOB">Date of birth:</label>
    <input type="date" id="dob" name="dob">
    <?php echo "&nbsp;&nbsp;".$dobErr; ?><br><br>
    <label for="religion">Choose your Religion:</label>
    <select name="religion" id="religion">
    <option></option>
    <option value="Islam">Islam</option>
    <option value="Hinduism">Hinduism</option>
    <option value="Christianity">Christianity</option>
    </select>
    <?php echo $religionErr; ?><br><br>   
    <label for="preddress">Enter your Present address:</label>
    <textarea name="preddress" rows="3" cols="40" ></textarea>
    <?php echo $preddressErr; ?><br><br>
    <label for="paraddress">Enter your Permanent address:</label>
    <textarea name="paraddress" rows="3" cols="40" ></textarea>
    <?php echo $paraddressErr; ?><br><br>
    <label for="phone">Enter your phone number:</label>
    <input type="tel" id="phone" name="phone">
    <?php echo $phoneErr; ?><br><br>
    <input type="submit" value="Submit">
    </fieldset>
 </form>
 <br>
 <?php echo "<b>".$successfulMessage."</b>"; ?>
 <?php echo "<b>".$errorMessage."</b>"; ?>

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