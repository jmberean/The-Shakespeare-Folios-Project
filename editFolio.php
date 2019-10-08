<?php
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

session_start();
$id = $_SESSION['id'];
$userID = $_SESSION['userName'];

$edition = mysql_real_escape_string($_POST['edition']);
$stcWing = mysql_real_escape_string($_POST['stcWing']);
$estc = mysql_real_escape_string($_POST['estc']);
$owner = mysql_real_escape_string($_POST['owner']);
$shelfMark = mysql_real_escape_string($_POST['shelfMark']);
$dimensions = mysql_real_escape_string($_POST['dimensions']);
$marginalia = mysql_real_escape_string($_POST['marginalia']);
$condition_desc = mysql_real_escape_string($_POST['condition_desc']);
$binding = mysql_real_escape_string($_POST['binding']);
$binder = mysql_real_escape_string($_POST['binder']);
$bookPlate = mysql_real_escape_string($_POST['bookPlate']);
$bookPlateLocation = mysql_real_escape_string($_POST['bookPlateLocation']);
$provenance = mysql_real_escape_string($_POST['provenance']);
$transfer = mysql_real_escape_string($_POST['transfer']);
$transferValue = mysql_real_escape_string($_POST['transferValue']);
$toddClassification = mysql_real_escape_string($_POST['toddClassification']);
$otnessNotes = mysql_real_escape_string($_POST['otnessNotes']);
$libraryNotes = mysql_real_escape_string($_POST['libraryNotes']);

$sql="UPDATE Folios SET edition_id = '$edition', stcWing = '$stcWing', estc = '$estc', owner = '$owner', shelfMark = '$shelfMark', dimensions = '$dimensions', marginalia = '$marginalia',condition_desc = '$condition_desc',binding = '$binding',binder = '$binder',bookPlate = '$bookPlate',bookPlateLocation ='$bookPlateLocation',provenance = '$provenance',transfer = '$transfer',transferValue = '$transferValue',toddClassification = '$toddClassification',otnessNotes = '$otnessNotes',libraryNotes = '$libraryNotes' WHERE ID ='$id' "; 

if ($conn->query($sql) === TRUE) {

    $sql = "SELECT * FROM Folios WHERE userID = '$userID' AND  ID = '$id'";
    $result=$conn->query($sql);
    $result = mysqli_query($conn, $sql); 
    if($result && mysqli_num_rows($result) > 0) {
    }else{
        $sql = "SELECT * FROM Collaborators WHERE userID = '$userID' AND  folioID = '$id'";
        $result=$conn->query($sql);
        $result = mysqli_query($conn, $sql); 
        if($result && mysqli_num_rows($result) > 0) {

        }else{
            $sql="INSERT INTO Collaborators(userID, folioID) VALUES('$userID','$id')"; 
            $result=$conn->query($sql);
        }
    }
    
    $_SESSION['message']="Folios has been updated"; 
    header("location:vSingle.php?id=$id");  //redirect home page
} else {
    $_SESSION['message']="Folios has not been updated"; 
    header("location:vSingle.php?id=$id");  //redirect home page
}
$conn->close();
?>
