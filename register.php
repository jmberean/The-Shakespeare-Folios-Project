<?php
session_start();
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$userName=($_POST['userName']);
$email=($_POST['email']);    
$fName=($_POST['firstName']);
$lName=($_POST['lastName']);
$institution=($_POST['institution']);
$phone=($_POST['phone']);
$password=($_POST['password']);
$password2=($_POST['password2']);  

$sql = "SELECT * FROM users WHERE userName = '$userName'";
$result=$conn->query($sql);
if($result){
  if( mysqli_num_rows($result) > 0){
    $_SESSION['message']="Username already exists!";
    header("location:registerPage.php");
  } 
  else {
    if($password==$password2) {           
      $password=md5($password); //hash password before storing for security purposes
      $sql="INSERT INTO users(userName, email, password,firstName,lastName,phone,institution ) VALUES('$userName','$email','$password','$fName','$lName','$institution','$phone')"; 
      if ($conn->query($sql) === TRUE) {
      $_SESSION['message']="You are now reistered"; 
      $_SESSION['userName']=$userName;
      header("location:profile.php");  //redirect home page
      } 
    }
    else {
      $_SESSION['message']="The two passwords do not match";   
      header("location:registerPage.php");
    }
  }
}
?>


