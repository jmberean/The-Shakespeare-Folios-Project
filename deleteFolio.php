<?php
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);

function validate($id, $table, $clause){
    $sql = "select count(*) as rows from {$table} where {$clause} = {$id}";
    global $conn;
    $result = $conn->query($sql) or trigger_error(mysqli_error($conn));
    $fetch = $result->fetch_assoc(); 
    $rows = $fetch["rows"];
    return $rows;
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET["id"])){
    
    $id = $_GET['id'];
    
    $photos = validate($id, "Photos", "FolioID"); 
    if(isset($photos) && intval($photos) > 0){
        $sql = "DELETE FROM Photos WHERE folioID ='$id'";
        $conn->query($sql);
    }
    
    $collaborators = validate($id, "Collaborators", "FolioID"); 
    if(isset($collaborators) && intval($collaborators) > 0){
        $sql = "DELETE FROM Collaborators WHERE folioID ='$id'";
        $conn->query($sql);
    }
    
    $folio = validate($id, "Folios", "ID"); 
    if(isset($folio) && intval($folio) > 0){
        $sql = "DELETE FROM Folios WHERE ID ='$id'";
        $result = $conn->query($sql);
    } 
    
    if($result){
         $_SESSION['message']="Record deleted successfully"; 
         header("location:profile.php");  //redirect home page
    } else {
        $_SESSION['message']="Error deleting record: " . $conn->error; 
       header("location:profile.php");  //redirect home page
    }
}  
else {
    $_SESSION['message']="Record deleted successfully"; 
    header("location:profile.php");  //redirect home page
    exit();
}


$conn->close();
?>