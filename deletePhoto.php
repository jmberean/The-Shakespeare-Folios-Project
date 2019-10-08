<?php
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
$id = $_SESSION["id"];
$_SESSION["message"] = $id;

$photoID = $_GET["photoID"];
$_SESSION["photoID"] = $photoID;


$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);

$sql = "DELETE FROM Photos WHERE folioID ='$id' AND ID ='$photoID'";
$conn -> query($sql);

if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    $id= $_SESSION['id'];
    $_SESSION['message']="The photo has been deleted.";

    header("location:vSingle.php?id=$id");  //redirect home page
} else {
    $_SESSION['message']="ERROR!";
    $id= $_SESSION['id'];
    header("location:vSingle.php?id=$id");  //redirect home page
}

$conn->close();
?>