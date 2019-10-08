<?php
session_start();
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";

$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $_SESSION['message']="File is not an image!";
        $uploadOk = 0;
    }
}
// Check if file already exists

$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
$id = $_SESSION['id'];
$path = basename( $_FILES["fileToUpload"]["name"]);

$sql = "SELECT * FROM Photos WHERE folioID ='$id' AND  path = '$path'";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $_SESSION['message']="File already exist!";
    $uploadOk = 0;
}

// if (file_exists($target_file)) {
//     $_SESSION['message']="File already exist!";
//     $uploadOk = 0;
// }


// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $_SESSION['message']="File is too large!";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $_SESSION['message']="Sorry, only JPG, JPEG, PNG & GIF files are allowed.!";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $id= $_SESSION['id'];
    header("location:vSingle.php?id=$id");  //redirect home page
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $_SESSION['message']="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $folioID = $_SESSION['id'];
        $path = basename( $_FILES["fileToUpload"]["name"]);
        $info = $_POST['desc'];
        $title = $_POST['title'];
        
        $sql="INSERT INTO Photos (folioID,path,info,title) VALUES ('$folioID','$path','$info','$title')";
        
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
            $id= $_SESSION['id'];
            $_SESSION['message']="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            header("location:vSingle.php?id=$id");  //redirect home page
        } else {
            $_SESSION['message']="ERROR!";
            $id= $_SESSION['id'];
            header("location:vSingle.php?id=$id");  //redirect home page
        }
    } else {
        $id= $_SESSION['id'];
        $_SESSION['message']="Sorry Image was not uplaoded!";
        header("location:vSingle.php?id=$id");  //redirect home page
    }
}
?>