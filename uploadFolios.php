<?php include 'header.php';?>

<div style="padding:10px;">
<div class="container-fluid" style="background:WHITE;border-radius:15px">

<h1 class="display-4" style="font-size:50px; text-align:center">Upoad a Folio!</h1>
<p class="lead"style=" text-align:center">Please provide the following information regarding the folio.</p>
<p style=" text-align:center">Keep in mind only 6 attributes of the folio are required, those being: Edition, Owner, Dimensions, Condition and Binding. <br>All others are optional, but we encourage you to you provide as much information as possible.</p>
<hr class="my-4">
  <div class="row">
    <div class="col">
      <form action="upFolios.php" method="POST">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Edition (Required)</label>
        <select class="form-control" name ="edition" id="exampleFormControlSelect1" required="required">
          <option>1632 (2nd)</option>
          <option>1663 (3.1)</option>
          <option>1664 (3.2)</option>
          <option>1685 (4th)</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Owner (Required)</label>
        <input required="required" name = "owner" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Current holder of the copy (Huntington Library, Folger Library, etc.)">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Dimensions (Required)</label>
        <input required="required" name = "dimensions" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Height and width of pages of the copy.">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Condition (Required)</label>
        <input required="required" name = "condition_desc" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Brief text description of distinguishing features of condition of copy.">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Binding (Required)</label>
        <input required="required" name = "binding" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Text description of binding.">
      </div>
      
      <div class="form-group">
        <label for="exampleFormControlInput1">STC / Wind #</label>
        <input name = "stcWing" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Number in the STC or Wing.">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">ESCT #</label>
        <input name = "estc" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Number in ESTC."">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Shelf Mark</label>
        <textarea name = "shelfMark" type="text" class="form-control" placeholder="Defined by Owner, number/letter code used in institutional holdings to identify copy."class="form-control" rows="3" placeholder="Enter a title for the photo(No more than 250 charecters)." maxlength="250"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Marginalia</label>
        <textarea name = "marginalia" type="text" class="form-control" placeholder="Brief text description of manuscript marginalia."class="form-control" rows="3" placeholder="Enter a title for the photo(No more than 250 charecters)." maxlength="250"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Binder</label>
        <input name = "binder" type="text" class="form-control date-own"  placeholder="Name of binder."> 
      </div>
    </div>









    <div class="col">


      <div class="form-group">
        <label for="exampleFormControlInput1">Book Plate</label>
        <textarea name = "bookPlate" type="text" class="form-control" placeholder="Name of owner of bookplate or other ownership mark." class="form-control" rows="3" maxlength="1000"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Book Plate Location</label>
        <textarea name = "bookPlateLocation" type="text" class="form-control" placeholder="Location of bookplate or other ownership mark." class="form-control" rows="3" maxlength="1000"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Provenance</label>
        <textarea name = "provenance" type="text" class="form-control" placeholder="Previous owner of the copy, by standardized name." class="form-control" rows="3" maxlength="1000"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Transfer</label>
        <textarea name = "transfer" type="text" class="form-control" placeholder="Terms of transfer from one owner to another (Sale, Bequest, Gift, etc)." class="form-control" rows="3" maxlength="1000"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Transfer Value</label>
        <input name = "transferValue" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Monetary value associated with a Transfer.">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Todd Classification</label>
        <textarea name = "toddClassification" type="text" class="form-control" placeholder="For 1632/2nd Folio edition only; classification of title page state as described by William Todd in “Issues and States of the Second Folio” (Studies in Bibliography, Vol. 5, 1952, pp. 81-108)." class="form-control" rows="3" maxlength="1000"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Otness Notes</label>
        <textarea name = "otnessNotes" type="text" class="form-control" placeholder="Transcription of text in Harold Otness’s Shakespeare Folio Handbook and Census (1990)." class="form-control" rows="3" maxlength="1000"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Library Notes</label>
        <textarea name = "libraryNotes" type="text" class="form-control" placeholder="Text entry of copy-specific notes from holding library of Copy." class="form-control" rows="3" maxlength="1000"></textarea>
      </div>

    </div>
  </div>
  <div class="row">
    <br><br>    
      <button type="submit" class="btn btn-primary btn-md" style="margin:10px">Submit</button>
    </form> 

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
