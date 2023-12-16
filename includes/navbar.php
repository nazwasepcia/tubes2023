<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="wawa" />
  <?php
    if (isset($additionalHead)) {
        echo $additionalHead;
    }
  ?>

  <title>Little Bakery | <?php echo $pageTitle; ?></title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo $assetLoc; ?>/css/bootstrap.css" />
  <!--slick slider stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- slick slider -->

  <link rel="stylesheet" href="<?php echo $assetLoc; ?>/css/slick-theme.css" />
  <!-- font awesome style -->
  <link href="<?php echo $assetLoc; ?>/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo $assetLoc; ?>/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo $assetLoc; ?>/css/responsive.css" rel="stylesheet" />
</head>
<body>
<div class="main_body_content">
    
<div class="hero_area">
  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          Little Bakery
        </a>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="public/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="public/about.php"> About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="public/products.php">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="p ublic/contact.php">Contact Us</a>
            </li>
          </ul>
        
          <?php if ($isUserLoggedIn): ?>
            <div class="quote_btn-container">
                  <a href="user/logout.php">
                    <i class="fa fa-user" aria-hidden="true"></i> <?php echo htmlspecialchars($_SESSION['username']); ?> | Logout
                  </a>
            </div>
          <?php else: ?>
            <div class="quote_btn-container">
                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                  <a href="user/login.php">
                      <span>Login</span>
                  </a>
                  <a href="user/register.php">
                      <span>Register</span>
                  </a>
            </div>
          <?php endif; ?>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->
</div>