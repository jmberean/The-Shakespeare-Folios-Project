<?php include 'header.php';?>
<div style="padding:10px">

<div class="container-fluid" style="background:WHITE;border-radius:10px;padding:20px">     

            <h1 class="display-4" style="margin-top:0px;padding-top:0px">Edit/Collab a Folio!</h1>
            <p class="lead">Please update or provide the following information regarding the folio.</p>
            <hr class="my-4">

            <?php
            $servername = "wyvern.cs.newpaltz.edu";$sqlusername = "p_s19_4";$password = "ergrqo";$dbname = "p_s19_4_db";
            $conn = new mysqli($servername, $sqlusername, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM Folios WHERE ID ='$id'";
            $result = $conn->query($sql);
            $row = mysql_fetch_array($result);
            if ($result) {
                $row = $result->fetch_assoc()
            ?>
            <div class="row">
            <div class="col">

            <form action="editFolio.php" method="POST">

            <div class="form-group">
              <label for="exampleFormControlSelect1">Edition (Required)</label>
              <select class="form-control" name ="edition" id="exampleFormControlSelect1" required="required">

                <?php if($row["edition_id"]=="1632 (2nd)"){ ?>
                  <option selected>1632 (2nd)</option>
                  <option>1663 (3.1)</option>
                  <option>1664 (3.2)</option>
                  <option>1685 (4th)</option>
                <?php } else if($row["edition_id"]=="1663 (3.1)"){ ?>
                  <option>1632 (2nd)</option>
                  <option selected>1663 (3.1)</option>
                  <option>1664 (3.2)</option>
                  <option>1685 (4th)</option>
                <?php } else if($row["edition_id"]=="1664 (3.2)"){ ?>
                  <option>1632 (2nd)</option>
                  <option>1663 (3.1)</option>
                  <option selected>1664 (3.2)</option>
                  <option>1685 (4th)</option>   
                <?php } else{ ?>
                  <option>1632 (2nd)</option>
                  <option>1663 (3.1)</option>
                  <option>1664 (3.2)</option>
                  <option selected>1685 (4th)</option>  
                <?php } ?>

              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Owner (Required)</label>
              <input required="required" name = "owner" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $row["owner"];?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Dimensions (Required) </label>
              <input required="required" name = "dimensions" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $row["dimensions"];?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Binding (Required)</label>
              <input required="required" name = "binding" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $row["binding"];?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Condition (Required)</label>
              <input required="required" name = "condition_desc" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $row["condition_desc"];?>">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">STC / Wind #</label>
              <input name = "stcWing" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $row["stcWing"];?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">ESCT #</label>
              <input name = "estc" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $row["estc"];?>">
            </div>
 
            <div class="form-group">
              <label for="exampleFormControlInput1">Shelf Mark</label>
              <textarea name = "shelfMark" type="text" class="form-control" placeholder="Defined by Owner, number/letter code used in institutional holdings to identify copy."class="form-control" rows="3" placeholder="Enter a title for the photo(No more than 250 charecters)." maxlength="250"><?php echo $row["shelfMark"];?></textarea>
            </div>


            <div class="form-group">
              <label for="exampleFormControlTextarea1">Marginalia</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "marginalia" maxlength="1000"><?php echo $row["marginalia"];?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Binder</label>
              <input name = "binder" type="text" class="form-control date-own" value="<?php echo $row["binder"];?>">
            </div>
            
          </div>

          <div class="col">

            <div class="form-group">
              <label for="exampleFormControlInput1">Book Plate</label>
              <textarea name = "bookPlate" type="text" class="form-control" placeholder="Name of owner of bookplate or other ownership mark." class="form-control" rows="3" maxlength="1000"><?php echo $row["bookPlate"];?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Book Plate Location</label>
              <textarea name = "bookPlateLocation" type="text" class="form-control" placeholder="Location of bookplate or other ownership mark." class="form-control" rows="3" maxlength="1000"><?php echo $row["bookPlateLocation"];?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Provenance</label>
              <textarea name = "provenance" type="text" class="form-control" placeholder="Previous owner of the copy, by standardized name." class="form-control" rows="3" maxlength="1000"><?php echo $row["provenance"];?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Transfer</label>
              <textarea name = "transfer" type="text" class="form-control" placeholder="Terms of transfer from one owner to another (Sale, Bequest, Gift, etc)." class="form-control" rows="3" maxlength="1000"><?php echo $row["transfer"];?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Transfer Value</label>
              <input name = "transferValue" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $row["transferValue"];?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Todd Classification</label>
              <textarea name = "toddClassification" type="text" class="form-control" placeholder="For 1632/2nd Folio edition only; classification of title page state as described by William Todd in “Issues and States of the Second Folio” (Studies in Bibliography, Vol. 5, 1952, pp. 81-108)." class="form-control" rows="3" maxlength="1000"><?php echo $row["toddClassification"];?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Otness Notes</label>
              <textarea name = "otnessNotes" type="text" class="form-control" placeholder="Transcription of text in Harold Otness’s Shakespeare Folio Handbook and Census (1990)." class="form-control" rows="3" maxlength="1000"><?php echo $row["otnessNotes"];?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Library Notes</label>
              <textarea name = "libraryNotes" type="text" class="form-control" placeholder="Text entry of copy-specific notes from holding library of Copy." class="form-control" rows="3" maxlength="1000"><?php echo $row["libraryNotes"];?></textarea>
            </div>

          </div>
        </div>
        <div class="row">
          <br><br>    
            <button type="submit" class="btn btn-primary btn-md" style="margin-left:10px">Submit</button>
          </form> 

          </div>
</div>






            <?php
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
          </div>
          </div> 
          </div> 

<script type="text/javascript">
    $('.date-own').datepicker({
      minViewMode: 2,
      format: 'yyyy'
    });
</script>
   
<?php include 'footer.php';?>





