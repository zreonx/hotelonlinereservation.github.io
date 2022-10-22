<?php include_once 'config.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLIVA HOTEL</title>
    <link rel="icon" href="<?php echo $URLROOT?>/images/favicon2.png" type="image/x-icon">
    
    <link rel="stylesheet" href="<?php echo $URLROOT; ?>/css/scrollbar.css">
    <link rel="stylesheet" href="<?php echo $URLROOT; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $URLROOT; ?>/wow/animate.css">
    <link rel="stylesheet" href="<?php echo $URLROOT; ?>/css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo $URLROOT; ?>/js/bootstrap.bundle.js"></script>
    <script src="<?php echo $URLROOT; ?>/wow/wow.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Raleway:ital,wght@0,100;0,300;0,400;0,500;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">



</head>
<body class="mybody">
<nav class="navbar fixed-top navbar-expand-sm navs navbar-light " id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img class="nav-img" src="<?php echo $URLROOT?>/images/olivalogo-dark.png" alt="" width="120" height="60px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ms-auto">
      <?php if(isset($_SESSION['user_id'])){
          if($_SESSION['user_type'] === "admin"){
        ?>

        <li class="nav-item hov ">
          <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/hor/includes/admin.inc.php" ? "active" : "");?>" href="<?php echo $URLROOT; ?>/includes/admin.inc.php">Home</a> 
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a href="<?php echo $URLROOT ?>/dashboard.php" class="dropdown-item" href="#"><i class="fa fa-fw fa-tachometer"></i> Dashboard</a></li>
              <li><a class="dropdown-item" href="<?php echo $URLROOT ?>/viewuser.php"><i class="fa fa-fw fa-user"></i> Manage User</a></li>
              <li><a href="<?php echo $URLROOT ?>/createroom.php " class="dropdown-item" href="#"><i class="fa fa-fw fa-hotel"></i> Create Rooms</a></li>
              <li><a class="dropdown-item" href="<?php echo $URLROOT ?>/reports.php"><i class="fa fa-fw fa-line-chart"></i> Reports</a></li>
            </ul>
        </li>
        <?php }else if($_SESSION['user_type'] === "user"){ ?>
          <li class="nav-item hov">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/hor/includes/user.inc.php" ? "active" : "");?>" href="<?php echo $URLROOT; ?>/includes/user.inc.php">Home</a> 
          </li>
          <li class="nav-item hov">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/hor/rooms.php" ? "active" : "");?>" href="<?php echo $URLROOT; ?>/rooms.php">Rooms</a> 
          </li>
          <li class="nav-item hov">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/hor/booking.php" ? "active" : "");?>" href="<?php echo $URLROOT; ?>/booking.php">Booking</a> 
          </li>
        <?php }
        } 
        else { ?>
          <li class="nav-item hov ">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/hor/index.php" ? "active" : "");?>" href="<?php echo $URLROOT; ?>/index.php">Home</a> 
          </li>
        <?php }?>
        <li class="nav-item hov ">
          <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/hor/gallery.php" ? "active" : "");?>" href="<?php echo $URLROOT; ?>/gallery.php">Gallery</a>
        </li>
        <li class="nav-item hov ">
          <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/hor/contact.php" ? "active" : "");?>" href="<?php echo $URLROOT; ?>/contact.php">Contact</a>
        </li>
        <li class="nav-item hov ">
          <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == "/hor/about.php" ? "active" : "");?>" href="<?php echo $URLROOT; ?>/about.php">About Us</a>
        </li>
       
      </ul>
      <ul class="navbar-nav ">
        <?php
            if(isset($_SESSION['user_id']) ){ ?>
            
            <li class="nav-item">
              <a href="<?php echo $URLROOT; ?>/profile.php" class="nav-link  <?php echo ($_SERVER['PHP_SELF'] == "/hor/profile.php" ? "active" : "");?>"><?php echo $_SESSION['user_name'] ?></a>
            </li>
            <li class="nav-item hov">
              <a href="<?php echo $URLROOT?>/includes/logout.inc.php" class="nav-link ">Logout</a>
            </li>
            <?php    
            }else {
            ?>
        <li class="nav-item hov">
            <a href="login.php" class="nav-link  <?php echo ($_SERVER['PHP_SELF'] == "/hor/login.php" ? "active" : "");?>">Login</a>
        </li>

        <?php } ?>
      </ul>
    </div>
  </div>
</nav> 
<div class="container d-flex flex-column min-vh-100">


