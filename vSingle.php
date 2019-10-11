<style>
hr.style-three {
height: 30px;
border-style: solid;
border-color: black;
border-width: 1px 0 0 0;
border-radius: 20px;
}
hr.style-three:before {
display: block;
content: "";
height: 30px;
margin-top: -31px;
border-style: solid;
border-color: black;
border-width: 0 0 1px 0;
border-radius: 20px;
}
</style>


<?php require_once('header.php'); 
if(!isset($_GET["id"])){
  header("Location: ./viewFolios.php");
  exit();
} else {
  $id = $_GET["id"];
  $_SESSION["id"] = $id;
}
?>

<div style="padding-top:10px">
<div class="container" style="background:WHITE;border-radius:10px;padding:10px">
<?php
    if(isset($_SESSION['message'])) { ?>
      <div class="alert alert-primary" role="alert">
        <?php echo "<div id='error_msg'>".$_SESSION['message']."</div>"; ?>
      </div>      
    <?php unset($_SESSION['message']); } ?>


  <div class="row justify-content-md-center">

    <!-- COLUMN 1 -->
    <div class="col-md-auto">
      <div class="btn-group-vertical" >
        <?php
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if(isset($_SESSION['userName'])) {
        $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
        $conn = new mysqli($servername, $sqlusername, $password, $dbname);
        $userName = $_SESSION['userName'];
        $id = $_SESSION['id'];
        if($conn) {        
            $sql = "SELECT * FROM Folios WHERE userID = '$userName' AND  ID = '$id'";
            $result=$conn->query($sql);
            $result = mysqli_query($conn, $sql); 

            if ($result && mysqli_num_rows($result) > 0 || $_SESSION['userName'] =="bereanj1"|| $_SESSION['userName'] =="mulready") 
            {
              $_SESSION['valid']="good";

        ?> 
        <a class="btn btn-primary" href="editFolioPage.php" role="button"style="font-size: 15px;">Edit</a>
        <!-- <a class="btn btn-primary" href="inviteColabPage.php" role="button"style="font-size: 15px;">Invite Collab</a> -->
        <a class="btn btn-primary" href="addPhotosPage.php" role="button"style="font-size: 15px;">Add Photos</a>
        <?php 
        echo '
        <a class="btn btn-primary" href="deleteFolio.php?id='.$id.'" role="button"style="font-size: 15px;">Delete</a>
        '; }}} ?>

        <?php
        if(isset($_SESSION['userName']) && !isset($_SESSION['valid'])){
          ?>     

        <a class="btn btn-primary" href="editFolioPage.php" role="button"style="font-size: 15px;">Collabrate</a>
        <a class="btn btn-primary" href="addPhotosPage.php" role="button"style="font-size: 15px;">Add Photos</a>
        <!-- <a class="btn btn-primary" href="requestCollab.php" role="button"style="font-size: 15px;">Request Collab </a> -->

        <?php } ?>
      </div>
    </div>

    <!-- COLUMN 2 -->
    <div class="col">

        <?php
        $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
        $conn = new mysqli($servername, $sqlusername, $password, $dbname);
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM Folios WHERE ID ='$id'";
        $result = $conn->query($sql);
        // $row = mysqli_fetch_assoc($result);
        // print_R($row);die;

        if ($result) {
            $row = $result->fetch_assoc();
            $_SESSION['source'] = $row["userID"];

        ?>

      <dl class="row">
        <dt class="col-sm-2"style="font-size: 15px;">Edition</dt>
        <dd class="col-sm-10"><?php echo $row["edition_id"]; $_SESSION['source']=$row["userID"];?></dd>

        <dt class="col-sm-2"style="font-size: 15px;">Owner</dt>
        <dd class="col-sm-10"><?php echo $row["owner"];?></dd>

        <div class="alert alert-secondary"  style="margin-top:20px;font-size:30px;width:100%;text-align:center;padding-top:5px;padding-bottom:10px" role="alert" >
        Reference Information
        </div>


        <dt class="col-sm-3"style="font-size: 15px;">SFP #</dt>
        <dd class="col-sm-9"><?php echo $row["ID"];?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>


        <dt class="col-sm-3"style="font-size: 15px;">STC/Wing #</dt>
        <dd class="col-sm-9"><?php echo $row["stcWing"];?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <dt class="col-sm-3"style="font-size: 15px;">ESTC #</dt>
        <dd class="col-sm-9"><?php echo $row["estc"];?></dd>

        
        <div class="alert alert-secondary"  style="margin-top:50px;font-size:30px;width:100%;text-align:center;padding-top:5px;padding-bottom:10px" role="alert" >
        Copy Information
        </div>

        <dt class="col-sm-3"style="font-size: 15px;">Condition</dt>
        <dd class="col-sm-9"><?php echo $row["condition_desc"];?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;z"/>

        <dt class="col-sm-3"style="font-size: 15px;">Dimensions</dt>
        <dd class="col-sm-9"><?php echo $row["dimensions"];?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>


        <dt class="col-sm-3"style="font-size: 15px;">Bindind</dt>
        <dd class="col-sm-9"><?php echo $row["binding"];?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <dt class="col-sm-3"style="font-size: 15px;">Binder</dt>
        <dd class="col-sm-9"><?php echo $row["binder"];?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <dt class="col-sm-3"style="font-size: 15px;">Shelfmark</dt>
        <dd class="col-sm-9"><?php echo htmlspecialchars($row["shelfMark"]);?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>


        <dt class="col-sm-3"style="font-size: 15px;">Marginalia</dt>
        <dd class="col-sm-9"><?php echo nl2br($row["marginalia"]);?></dd>

        <div class="alert alert-secondary"  style="margin-top:50px;font-size:30px;width:100%;text-align:center;padding-top:5px;padding-bottom:10px" role="alert" >
        Ownership Information
        </div>

        <dt class="col-sm-3"style="font-size: 15px;">Book plate</dt>
        <dd class="col-sm-9"><?php echo nl2br($row["bookPlate"]);?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <dt class="col-sm-3"style="font-size: 15px;">Book plate Location</dt>
        <dd class="col-sm-9"><?php echo nl2br($row["bookPlateLocation"]);?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px;margin-top:20px"/>

        <dt class="col-sm-3"style="font-size: 15px;">Provenance</dt>
        <dd class="col-sm-9"><?php echo nl2br($row["provenance"]);?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <dt class="col-sm-3"style="font-size: 15px;">Transfer</dt>
        <dd class="col-sm-9"><?php echo nl2br($row["transfer"]);?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <dt class="col-sm-3"style="font-size: 15px;">Transfer Value</dt>
        <dd class="col-sm-9"><?php echo nl2br($row["transferValue"]);?></dd>
        
        <div class="alert alert-secondary"  style="margin-top:50px;font-size:30px;width:100%;text-align:center;padding-top:5px;padding-bottom:10px" role="alert" >
        Notes
        </div>


        <dt class="col-sm-3"style="font-size: 15px;padding-bottom:10px">Todd Classification</dt>
        <dd class="col-sm-9"><?php echo nl2br($row["toddClassification"]);?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <dt class="col-sm-3"style="font-size: 15px;;padding-bottom:10px">Otness Notes</dt>
        <dd class="col-sm-9"><?php echo nl2br($row["otnessNotes"]);?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <dt class="col-sm-3"style="font-size: 15px;">Library Notes</dt>
        <dd class="col-sm-9"><?php echo nl2br($row["libraryNotes"]);?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <?php
      } else {
          echo "0 results";
      }
      $conn->close();
      ?>

        <?php
        $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
        $conn = new mysqli($servername, $sqlusername, $password, $dbname);
        $source = $_SESSION['source'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE userName ='$source'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        if ($result) {
            $row = $result->fetch_assoc();
            
            if($_SESSION['source']=="Folio Survey" ||
            $_SESSION['source']=="Folio Survey (Thomas Olsen)"||
            $_SESSION['source']=="ESTC"||
            $_SESSION['source']=="Catalog (Hamnet)"){
      ?>
        <dt class="col-sm-3"style="font-size: 15px;">Source</dt>
        <dd class="col-sm-9"><?php echo nl2br($_SESSION['source']);?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

      <?php
            }
            else{

        ?>

        <dt class="col-sm-3"style="font-size: 15px;">Source</dt>
        <dd class="col-sm-9"><?php echo $row["firstName"];?> <?php echo $row["lastName"];?></dd>
        <hr class="style-three"style="width: 100%;padding:0px;margin:10px"/>

        <?php
      }} else {
          echo "0 results";
      }
      $conn->close();
      ?>


      <dt class="col-sm-3"style="font-size: 15px;">Collaborators</dt>
      <dd class="col-sm-9">
      <?php
        $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
        $conn = new mysqli($servername, $sqlusername, $password, $dbname);
        $userName = $_SESSION['userName'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM Collaborators WHERE folioID ='$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $x = 0; 

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {

          if($x>0){
            echo ",";
          }            
          $x++;
        ?>

        <?php echo $row["userID"];
        }
        } else {
          echo "No collaborators";
      }
      $conn->close();
      ?> 
      </dd>







      </dl>
      




    </div> <!-- COLUMN 2 -->


    <!-- COLUMN 3 -->
    <div class="col-md-auto">

      <?php
      if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
      }
      $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
      $conn = new mysqli($servername, $sqlusername, $password, $dbname);
      $id = $_SESSION['id'];
      $_SESSION['id'] = $id;
      $sql = "SELECT * FROM Photos WHERE folioID ='$id'";
      $result = $conn->query($sql);
      $row = mysqli_fetch_assoc($result);
      if ($result->num_rows > 0) {
        ?>
            <?php
        // output data of each row
          while($row = $result->fetch_assoc()) {
            $photoID = $row["ID"];
      ?>
      

      <div class="col">
        <div class="card" style="width: 15rem;">
          <img class="card-img-top" src="uploads/<?php echo $row["path"];?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row["title"];?></h5>
            <p class="card-text"><?php echo $row["info"];?></p>
            <?php 
            if(isset($_SESSION['valid'])) {
            
            echo '<a class="btn btn-primary" style="float:right" href="deletePhoto.php?photoID='.$photoID.'" role="button">Delete</a>';  
          }

            
            ?>
         
          </div>
        </div>
      </div>
      <?php 
      }
      }
      unset($_SESSION['valid']); 
      ?>
      
       <!-- else {
        ?>
        <div class="col">
        <div class="card" style="width: 15rem;">
          <img class="card-img-top" src="backgrounds/sp1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">No photos yet!</h5>
            <p class="card-text">This image is replaceable with a picture/marginalia of the actual folio.</p>
          </div>
        </div>
      </div> -->
      <?php 
     
      $conn->close();
      ?>
    </div>  <!-- for column 3 -->

  </div> <!-- for row -->
 
  </div> <!-- for container -->
  
  </div> <!-- for top div -->


<?php require_once('footer.php'); ?>
