<!DOCTYPE html>
<html lang="en"> 
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="Anaz" content="#">    
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png"> 
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,900&display=swap" rel="stylesheet">



	<?php
	wp_head();
	?>


<style>
  body {
    font-family: 'Poppins', sans-serif;
      }
  
</style>
</head> 

<body>
    
<header>
	<nav class="navbar fixed-top  navbar-expand-lg navbar-light bg-light" >
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <span
        class="navbar-toggler"
        type=""
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
      <img
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png"
            height="30"
            alt="Logo"
            loading="lazy"
          />
      </span>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="ps-3 navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png"
            height="30"
            alt="Logo"
            loading="lazy"
          />
        </a>
       
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/twitter.png" width="25px" alt="">
        </a>
  
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/facebook.png" width="25px" alt="">
        </a>
        <!-- Icon -->
        <a class="text-reset me-5" href="#">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/google-plus.png" width="30px" alt="">
        </a>
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/search.png" width="25px" alt="">
        </a><!-- Icon -->
        <a class="text-reset me-3 pe-3" href="#">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/menu-bar.png" width="25px" alt="">
        </a>
        
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
    </header>
  