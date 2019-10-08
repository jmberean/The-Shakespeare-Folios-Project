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
    
    $responses = validate($id, "csteamResponses", "qID"); 
    if(isset($responses) && intval($responses) > 0){
        $sql = "DELETE FROM csteamResponses WHERE qID ='$id'";
        $conn->query($sql);
    }
    
    // $collaborators = validate($id, "Collaborators", "FolioID"); 
    // if(isset($collaborators) && intval($collaborators) > 0){
    //     $sql = "DELETE FROM Collaborators WHERE folioID ='$id'";
    //     $conn->query($sql);
    // }
    
    $question = validate($id, "csteamQuestions", "ID"); 
    if(isset($question) && intval($question) > 0){
        $sql = "DELETE FROM csteamQuestions WHERE ID ='$id'";
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
    header("location:profile.php");  //redirect home page
    exit();
}


$conn->close();
?>