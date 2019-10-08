<?php
  if(isset($_SESSION['userName'])){
    header("location:login.php");
    die();
  }
  
?>
<?php include 'header.php';?>

<div class="container" style="margin-top:10px; margin-bottom: 20px;background-color:WHITE; padding: 50px;border-radius: 15px">
    <div class="jumbotron-fluid" style="background-color: WHITE;padding: 30px">
        <h1 class="display-4">Colab!</h1>
        <p class="lead">Please insert the username of the collabarotor you would like to invite below.<br>
        
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

        </p>
        <hr class="my-4">
        <div class="container">
          <form method="post" action="inviteColab.php">
              <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="userName" required="required">
              </div>
                <button type="submit" name="register_btn" class="Register btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>

<?php include 'footer.php';?>


