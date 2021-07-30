<?php $page_name = basename($_SERVER['PHP_SELF']); ?>
<?php
if($page_name=="index.php"){
    $page_classes=" home-page";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/codeathon-bootstrap.css" rel="stylesheet">
    <link href="css/codeathon.min.css?<?php echo date("H:i:s");?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body class="<?=$page_classes?>">
    <header class="header-wrapper">
        <span class="codeathon">
            <img src="images/codeathon.svg">
        </span>
        <div class="group-logos">
            <div class="column">
                <span class="title">PRESENTED BY</span>
                <img src="images/group-logo/dell.png">
            </div>
            <div class="column">
                <span class="title">PARTNER</span>
                <img src="images/group-logo/delhi-sarkar.png">
            </div>
            <div class="column">
                <span class="title">POWERED BY</span>
                <img src="images/group-logo/ibm.png">
            </div>
            <div class="column">
                <span class="title">CAUSE PARTNER</span>
                <img src="images/group-logo/speed.png">
            </div>
        </div>
        <div class="header-right">
            <span class="ht-school"><img src="images/ht-school.svg"></span>
            <div class="account">
                <a href="#!" class="register"><span class="caption">Register</span></a>
                <a href="#!" class="login"><span class="caption">Login</span></a>
            </div>
            <button class="home-button">
                <span class="burger"></span>
            </button>
        </div>
    </header>
    <div class="navigation-wrapper">
        <ul>
            <li><a href="#!">About Us</a></li>
            <li><a href="#!">Learning Modules</a></li>
            <li><a href="#!">How it works</a></li>
            <li><a href="#!">Leaderboard</a></li>
            <li class="active"><a href="#!">About Our Partners</a></li>
            <li><a href="#!">Project Gallery</a></li>
            <li><a href="#!">What Our Partners Say</a></li>
            <li><a href="#!">Blog</a></li>
            <li><a href="#!">Coding For Cause</a></li>
        </ul>
        <div class="account">
            <a href="#!" class="register"><span class="caption">Register</span></a>
            <a href="#!" class="login"><span class="caption">Login</span></a>
        </div>
    </div>