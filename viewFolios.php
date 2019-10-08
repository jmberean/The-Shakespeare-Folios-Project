<?php include 'header.php';?>

<div style="padding-right:100px;padding-left:100px;margin-top:10px;">
<div class="container-fluid table-responsive" style="background:WHITE;padding:20px;border-radius:10px;">
  <h1 class="display-4" style="font-size: 30px;">Folios Records</h1>

  <input style="font-size: 15px;" type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search by SFP #, Edition or Owner" title="Type in a name">

  <table class="table" id="myTable" style="font-size: 13px;">

  <thead>
    <tr>
    <th  scope="col" width="15%">SFP # <i onclick="sortTable(0)" class="fas fa-sort mr-3 btn" style="font-size: 15px;cursor: pointer;"></i> </th>
    <th scope="col" width="20%">Edition<i  onclick="sortTable(1)" class="fas fa-sort mr-3 btn" style="font-size: 15px;cursor: pointer;"></i> </th>
    <th scope="col" width="20%">Owner <i onclick="sortTable(2)" class="fas fa-sort mr-3 btn" style="font-size: 15px;cursor: pointer;"></i> </th>
    <th scope="col" width="10%">Visit</th>
    </tr>
  </thead>
  <tbody>
    
  <?php
  $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
  $conn = new mysqli($servername, $sqlusername, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
    
  $sql = "SELECT * FROM Folios";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
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
        <a class="btn-sm btn-primary" onclick="window.location='<?php echo $str; ?>'" role="button" style="color:WHITE;font-size: 12px ">View</a>
      </td>

  </tr>
  
  <?php 
  }} else {
    echo "0 results";
  }
  $conn->close();
  ?>
  </tbody>
 </table>
</div>
</div>
</div>


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
