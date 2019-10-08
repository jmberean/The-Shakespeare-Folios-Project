<?php require_once('header.php'); ?>

<div class="container" style="margin-top:10px;background-color:WHITE; padding: 40px;border-radius: 15px;padding-top:10px">

        <h1 class="display-4">Browse!</h1>
        <p class="lead">Select the attributes you would like to filter our records by.</p>

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


        <hr class="my-4">
                   
        <div class="row">

            <div class="col">
                <form action="browseSearch.php" method="GET">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Edition</label>
                    <select class="form-control" name ="edition" id="exampleFormControlSelect1" required="required">
                    <option>1632 (2nd)</option>
                    <option>1663 (3.1)</option>
                    <option>1664 (3.2)</option>
                    <option>1685 (4th)</option>
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Source</label>
                    <select class="form-control" name ="source" id="exampleFormControlSelect1" required="required">
                    <option>Catalog (Hamnet)</option>
                    <option>ESTC</option>
                    <option>Folio Survey</option>
                    <option>Folio Survey (Thomas Olsen)</option>
                    <option>Shakespeare Birthplace Trust</option>
                    </select>
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        <?php
          if(isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
          }
        ?>
        </form>

</div>
<?php include 'footer.php';?>

