<?php
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

session_start();

$userID = $_SESSION['userName'];
$edition =  mysql_real_escape_string($_POST['edition']); // i thought t his would work
$stcWing =  mysql_real_escape_string($_POST['stcWing']);
$estc =  mysql_real_escape_string($_POST['estc']);
$owner =  mysql_real_escape_string($_POST['owner']);
$shelfMark =  mysql_real_escape_string($_POST['shelfMark']);
$dimensions =  mysql_real_escape_string($_POST['dimensions']);
$marginalia =  mysql_real_escape_string($_POST['marginalia']);
$condition_desc =  mysql_real_escape_string($_POST['condition_desc']);
$binding =  mysql_real_escape_string($_POST['binding']);
$binder =  mysql_real_escape_string($_POST['binder']);
$bookPlate =  mysql_real_escape_string($_POST['bookPlate']);
$bookPlateLocation =  mysql_real_escape_string($_POST['bookPlateLocation']);
$provenance =  mysql_real_escape_string($_POST['provenance']);
$transfer =  mysql_real_escape_string($_POST['transfer']);
$transferValue =  mysql_real_escape_string($_POST['transferValue']);
$toddClassification =  mysql_real_escape_string($_POST['toddClasification']);
$otnessNotes =  mysql_real_escape_string($_POST['otnessNotes']);
$libraryNotes =  mysql_real_escape_string($_POST['libraryNotes']);



$sql="INSERT INTO Folios 
(userID,edition_id,stcWing,estc,owner,dimensions,condition_desc,binding,shelfMark,marginalia,binder,bookPlate,bookPlateLocation,provenance,transfer,transferValue,toddClassification,otnessNotes,libraryNotes) 
VALUES 
('$userID','$edition','$stcWing','$estc','$owner','$dimensions','$condition_desc','$binding','$shelfMark','$marginalia','$binder','$bookPlate','$bookPlateLocation','$provenance','$transfer','$transferValue','$toddClassification','$otnessNotes','$libraryNotes')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['message']="The folio has been succesfully uploaded.";
    header("location:profile.php");  //redirect home page
} else {
    $_SESSION['message']="The folio has not been succesfully uploaded due to an error.";
    header("location:profile.php");  //redirect home page
}

$conn->close();
?>
