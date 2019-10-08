<?php 
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
 
    </style>

<div style="font-size: 15px;">

    <nav class="navbar sticky-top navbar-expand-lg nav-fill navbar-light" style="background-color: #f7e99f;">
        
        <a class="navbar-brand" href="index.php" style="font-size: 15px;">Shakespeare's Folios</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="viewFolios.php">Folios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="browse.php">Browse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="getInvolved.php">Get Involved</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="people.php">People</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="news.php">Latest News</a>
                    </li>

                    <?php
                    if (session_status() != PHP_SESSION_ACTIVE) {
                        session_start();
                    }
                    if(isset($_SESSION['userName'])) { ?> 

                        <li class="nav-item">
                            <a class="nav-link" href="uploadFolios.php">Post</a>
                        </li>

                    <?php } ?>
                </ul>
        
		<ul class="navbar-nav justify-content-end">          
            <?php
            if (session_status() != PHP_SESSION_ACTIVE) {
                session_start();
            }
            if(isset($_SESSION['userName'])) { ?>

                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                    
                    
                    <?php
                    echo ($_SESSION['userName']);
                     ?>
                    
                    
                    
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log out</a>
                </li>

            <?php }else { ?>

                <li class="nav-item">
                    <a class="nav-link" href="loginPage.php">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registerPage.php">Register</a>
                </li>

            <?php } ?>       
		</ul>
    </div>
</nav>
</head>
</div>
<body style= "background-image: url('backgrounds/bg1.png');; background-position: left top; background-size: auto; background-repeat: repeat; background-attachment: fixed;">

   