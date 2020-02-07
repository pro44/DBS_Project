<?php
require_once 'connection.php';
$obj = new db();
$basic_info = $obj->getMultiData("basic_info");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>
       <?php foreach($basic_info as $value){ 
            echo $value['title'];
        }?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAwesome CSS -->
    <link href="../kusina/fonts/fontawesome/css/all.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
    <!-- NAV STARTS -->
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light <?php if( @$homeActive != 'active' ){ echo 'ftco-navbar-light-2';} ?>" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="./index.php"><img src="logo/logo1.jpg" width="85"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item <?php echo @$homeActive; ?>"><a href="./index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item <?php echo @$aboutActive; ?>"><a href="./about.php" class="nav-link">About</a></li>
	        	<li class="nav-item <?php echo @$menuActive; ?>"><a href="./menu.php" class="nav-link">Specialties</a></li>
	        	<li class="nav-item <?php echo @$reviewsActive; ?>"><a href="./post-reviews.php" class="nav-link">Post Review</a></li>
	        	<li class="nav-item <?php echo @$contactActive; ?>"><a href="./contact.php" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- NAV ENDS -->
