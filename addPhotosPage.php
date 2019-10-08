<?php include 'header.php';
$id= $_SESSION['id'];
?>
    <div class="container" style="background:WHITE;margin-top:25px;border-radius:15px;padding-bottom:10px">
            <h1 class="display-4">Upoad an image!</h1>
            <p class="lead">Please choose a photo regarding the folio, must provide a title and description.</p>
            <hr class="my-4">

            <form action="addPhotos.php" method="post" enctype="multipart/form-data" >
              Select image to upload:
              <input type="file" name="fileToUpload" id="fileToUpload" required="required">
              <br>
              <br>
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a title for the photo(No more than 10 charecters)." maxlength="10" name="title"  required="required">
            </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Information</label>
                <textarea class="form-control" required="required" name="desc" id="exampleFormControlTextarea1" rows="3" placeholder="Enter a title for the photo(No more than 250 charecters)." maxlength="250"></textarea>
              </div>

  
              <button style="margin-bottom:10px" type="submit" class="btn btn-primary btn-md" type="submit" value="Upload Image" name="submit">Submit</button>

            </form> 
          </div>
<?php include 'footer.php';?>
