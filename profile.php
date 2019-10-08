<?php
require_once('header.php'); 
if(!isset($_SESSION['userName'])){
  header("location:login.php");
  die();
}
$servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
if($conn){
  $userName=($_SESSION['userName']);
  $sql="SELECT * FROM users WHERE userName ='$userName'";
  $result=$conn->query($sql);
  $result = mysqli_query($conn, $sql); 
  if ($result && mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc()
    ?>

<div class="container" style="background:WHITE;border-radius:10px;padding:20px;padding-top:10px;margin-top:10px">


<?php
    if(isset($_SESSION['message'])){
    ?>
    <div class="alert alert-primary" role="alert">
      <?php
      echo "<div id='error_msg'>".$_SESSION['message']."</div>";
      ?>
    </div>      
    <?php      
        unset($_SESSION['message']);
    }
    ?>


      <div class="row">
      <div class="col-md-auto">
      <div class="container">
      <h1 class="display-5" style="font-size: 20px;">Welcome <?php echo $row["firstName"];?>!</h1>
      <p class="lead">
      
      </p>
      <hr class="my-4">
      <div class="container" >
      <p style="font-size: 15px;">
      <i class="fas fa-user mr-3"></i><?php echo $row["userName"];?></p>
      <?php if($row["institution"]!=""){ ?>
      <p style="font-size: 15px;">
      <i class="fas fa-building mr-3"></i><?php echo $row["institution"];?></p>
      <?php }?>



      <p style="font-size: 15px;">
      <i class="fas fa-envelope mr-3"></i><?php echo $row["email"];?></p>
      <?php if($row["phone"]!=""){ ?>

      <p style="font-size: 15px;">
      <i class="fas fa-phone mr-3"></i><?php echo $row["phone"];?></p>
      <?php }?>

      <hr class="my-4">
      <a href="logout.php" style="font-size: 15px;">Log Out</a>
      </div>
      </div>
      </div>

<?php
  }else{
    $_SESSION['message']="Username or Password incorrect!";
    header("location:loginPage.php");
  }
}
?>

     
    <div class="col" >
    <div class="container table-responsive">

    <h1 style="font-size: 30px;">Folios Records</h1>


    <?php
    session_start();
    $userName = $_SESSION['userName'];
    $sql = "SELECT * FROM Folios WHERE userID = '$userName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {?>



    <input style="font-size: 15px;" type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search by SFP #, Edition or Owner" title="Type in a name">

    <table class="table" id="myTable" style="font-size: 15px;">

    <thead style="font-size: 15px;">
    <tr>
    <th scope="col">SFP # <i onclick="sortTable(0)" class="fas fa-sort mr-3 btn"></i> </th>
    <th scope="col">Edition<i onclick="sortTable(1)" class="fas fa-sort mr-3 btn"></i> </th>
    <th scope="col">Owner <i onclick="sortTable(2)" class="fas fa-sort mr-3 btn"></i> </th>
    <th scope="col">Visit</th>
    </tr>
  </thead>
    <tbody >

    <?php
    session_start();
    $userName = $_SESSION['userName'];
    $sql = "SELECT * FROM Folios WHERE userID = '$userName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $id = $row["ID"];
          $str = "./vSingle.php?id=$id";
          ?>
          <tr onclick="window.location='<?php echo $str; ?>'" style="cursor: pointer;">
          <td>
          <?php 
          echo $row["ID"];
          ?>
      </td>
      <td>
          <?php 
          echo $row["edition_id"];
          ?>
      </td>
      <td>
          <?php 
          echo $row["owner"];
          ?>
      </td>
      <td>
        <a class="btn-sm btn-primary" onclick="window.location='<?php echo $str; ?>'" role="button" style="color:WHITE">View</a>
      </td>
          </tr>
    </tbody>
    <?php }}} else {
      echo "No folios yet! Click here to add a folio!";

      ?>
      <br>
      <br>
        <a class="btn btn-primary" href="getInvolved.php" role="button">Get Involved!</a>
      <?php

    }
    $conn->close();
    ?>
 </table>
</div>
</div>
</div>
</div>
</div>

<?php
      if(isset($_SESSION['message'])){
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
      }
      ?>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    for (c = 0; c < 3; c++) {
      txtValue += tr[i].children[c].innerText + " "
    }
    if (txtValue) {
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
        txtValue = "";
      }
  }  
}
</script>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

<?php include 'footer.php';?>
