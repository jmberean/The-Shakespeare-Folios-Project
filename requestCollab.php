<?php
session_start();
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$userName=($_POST['userName']);
$folioID=($_SESSION["id"]);
$id=$_SESSION['id'];

if($userName == $_SESSION["userName"]){
  $_SESSION['message']="Youre already the owner!";
  header("location:inviteColabPage.php");
}
else{

  $sql="SELECT * FROM users WHERE userName ='$userName'";// AND password='$password'";
  $result=$conn->query($sql);
  $result = mysqli_query($conn, $sql); 

  if ($result && mysqli_num_rows($result) > 0) {

    $sql = "SELECT * FROM Collaborators WHERE userID = '$userName' AND  folioID = '$folioID'";
    $result=$conn->query($sql);
    $result = mysqli_query($conn, $sql); 
    
    if($result && mysqli_num_rows($result) > 0) {
        $_SESSION['message']="User is already invited!";
        header("location:inviteColabPage.php");
      } else {
          $sql="INSERT INTO Collaborators(userID, folioID) VALUES('$userName','$folioID')"; 
          if ($conn->query($sql) === TRUE) {
          $_SESSION['message']="User nivited"; 
          header("location:vSingle.php?id=$id");  //redirect home page
          }
        }
  }
  else{
    $_SESSION['message']="User does not exist"; 
    header("location:inviteColabPage.php");  //redirect home page
  }

}

?>


