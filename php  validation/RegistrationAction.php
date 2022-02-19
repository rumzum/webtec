<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Validation (PHP)</title>
</head>
<body>

<?php  

$fname = $lname = $gender = $dob = $religion = $praddress = $peaddress = $web =$phone = $email = $username = $password = $cpassword = "";  
$flag = false;
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
    if (empty($_POST["fname"])) 
    {  
        echo " first Name is required"; 
        $flag = True;
    } 
  
    
    if (empty($_POST["lname"])) 
    {  
        echo " Last Name is required";
        $flag = True;  
    } 
     
    
    if (empty($_POST["gender"])) 
    {  
        echo " Gender is required";
        $flag = True;  
    } 
      

    if (empty($_POST["dob"])) 
    {  
        echo " Date of birth is required";
        $flag = True;  
    }  

    if (empty($_POST["religion"])) 
    {  
        echo " Religion is required";
        $flag = True;  
    } 


    if (empty($_POST["email"])) 
    {  
       echo " Email is required";
       $flag = True;  
    } 

    if (empty($_POST["username"])) 
    {  
       echo " Username is required";
       $flag = True;  
    } 

    if (empty($_POST["password"])) 
    {  
       echo " Password is required";
       $flag = True;  
    } 
    if (empty($_POST["cpassword"])) 
    {  
       echo " Password is required";
       $flag = True;  
    } 

    
    if(!$flag) 
    {
      $fname = input_data($_POST["fname"]);
      $lname = input_data($_POST["lname"]);
      $dob = input_data($_POST["dob"]);
      $religion = input_data($_POST["religion"]);
      $praddress = input_data($_POST["Praddress"]);
      $peaddress = input_data($_POST["Peaddress"]);
      $email = input_data($_POST["email"]);
      $phone = input_data($_POST["phone"]);
      $web = input_data($_POST["Web"]);
      $username = input_data($_POST["username"]);
      $password = input_data($_POST["password"]);
      $cpassword = input_data($_POST["cpassword"]);

      echo "<h1>Your Information</h1>";

      echo "Your First name:" . $fname; echo "<br>";
      echo "Your Last name:" . $lname; echo "<br>";
      if(isset($_POST['gender']))
       {
       echo "You have selected :".$_POST['gender']; 
       }
      echo "<br>";
      echo "Your Date of birth:" . $dob; echo "<br>";
      echo "Your Religion:" . $religion; echo "<br>";
      echo "Your Present Address:" . $praddress; echo "<br>";
      echo "Your Permanent Address:" . $peaddress; echo "<br>";
      echo "Your Phone:" . $phone; echo "<br>";
      echo "Your Email:" . $email; echo "<br>";
      echo "Your Website:" . $web; echo "<br>";
      echo "Your Username:" . $username; echo "<br>";
      echo "Your Password:" . $password; echo "<br>";
      echo "Your Password:" . $cpassword; echo "<br>";
    }
  
}  
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?> 

    <hr><hr>

    <a href="registration.html">Go Back</a>

</body>
</html>

