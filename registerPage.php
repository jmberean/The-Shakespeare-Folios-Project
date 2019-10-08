<?php
if(isset($_SESSION['userName'])){
header("location:profile.php");// ithink its this so username is set
die();
}
?>
<?php include 'header.php';?>

<div class="container" style="margin-top:10px;background-color:WHITE; padding: 40px;border-radius: 15px;padding-top:10px">
        <h1 class="display-4">Register!</h1>

        <p class="lead">Please register with your email and password information below.<br>
        <?php
          if(isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
          }
        ?>
        </p>

        <hr class="my-4">
        <div class="container" >
                   
        <form method="post" action="register.php">
        
            <div class="form-group">
                <label for="exampleInputEmail1">First Name (Required)</label>
                <input required="required" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" name="firstName">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Last Name (Required)</label>
                <input required="required" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter last name" name="lastName">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Username (Required)</label>
                <input required="required" maxlength="12" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter unique username (max 12 charecters)" name="userName">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Institutional Affiliation</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter institutional affiliation if any." name="institution">
            </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address (Required)</label>
                <input required="required" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email address." name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password (Required, must be 8 charecters in length)</label>
                <input required="required" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password." name="password" minlength="8">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password (Required, must match password entered above)</label>
                <input required="required" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password." name="password2" minlength="8">
              </div>

            <button type="submit" name="register_btn" class="Register btn btn-primary">Submit</button>
          </form>

          </div>
</div>

<?php include 'footer.php';?>


