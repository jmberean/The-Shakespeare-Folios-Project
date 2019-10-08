<?php session_start(); ?>
<?php require_once('header.php'); ?>

<div class="container" style="margin-top:10px; margin-bottom: 20px;background-color:WHITE; padding: 30px;padding-top:10px;border-radius: 15px">
        <h1 class="display-4">Get involved!</h1>
        <p class="lead">Interesting in supporting The Shakespeare Folios Project?</p>
        <hr class="my-4">
        <div class="container" >

        <p>We welcome contributions from any librarian, student, or scholar working with a physical copy of one of Shakespeare’s Second, Third, or Fourth Folios. You must first REGISTER (link) with the site to edit or create a new Folio Profile.
        <br><br>
Once you have registered, please check our database to see if the copy you are reporting is already included in the project. If it is, once you have registered, you will be able to make changes to an existing record.
<br><br>
If your copy is not included in our database, please create a new Folio Profile.
</p>
        
        <?php 
        if(isset($_SESSION['userName'])){
        ?>
            <p>By clicking below you may add known copies of folios by providing information about them.</p> 
            <a class="btn btn-primary" href="uploadFolios.php" role="button">Post a folio!</a>
        <?php
        }else{
        ?>
            <p>By registering succesfully with a proile you made add known copies of folios by providing information about them.</p>      
            <a class="btn btn-primary" href="registerPage.php" role="button">Register!</a>
        <?php 
        }
        ?>        

        </div>
</div>
<?php include 'footer.php';?>

