<?php session_start(); ?>
<?php 
if(isset($_SESSION['userName'])){
header("location:profile.php");
die();
}
?>
<?php require_once('header.php'); ?>

<div class="container" style="margin-top:10px;background-color:WHITE; padding: 40px;border-radius: 15px;padding-top:10px">

        <h1 class="display-4">Login!</h1>
        <p class="lead">Please log in with your email and password information below.</p>

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
        <div class="container" >
                   
        <form method="post" action="login.php">
        <div class="form-group">
          <label for="exampleInputUsername">Username</label>
          <input type="username" name = "userName" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name = "password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
</div>
<?php include 'footer.php';?>

