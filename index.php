<?php
session_start();
require_once 'includes/db_connect.php';

$isUserLoggedIn = isset($_SESSION['username']);

// Ambil data produk dari database
try {
  $query = "SELECT nama, harga, foto FROM produk";
  $stmt = $pdo->query($query);
  $produk = $stmt->fetchAll();
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>

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

  <title>Little Bakery</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
  <!--slick slider stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- slick slider -->

  <link rel="stylesheet" href="assets/css/slick-theme.css" />
  <!-- font awesome style -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="assets/css/responsive.css" rel="stylesheet" />
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
              <a class="nav-link" href="public/contact.php">Contact Us</a>
            </li>
          </ul>
          <?php if ($isUserLoggedIn): ?>
            <div class="quote_btn-container">
                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                  <a href="user/logout.php">
                      <span></span> Logout
                  </a>
            </div>
          <?php else: ?>
            <div class="quote_btn-container">
                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                  <a href="user/login.php">
                      <span></span> Login
                  </a>
            </div>
          <?php endif; ?>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->

</div>
<div id="banner" class="container-fluid" style="background-size: cover;">
    <h1 class="text-center"><strong>Little Bakery</strong></h1>
</div>
    <!-- about section -->

    <section class="about_section layout_padding ">
      <div class="container  ">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  About Croissant
                </h2>
              </div>
              <p>
              Croissants are named for their historical crescent shape. The dough is layered with butter, rolled and folded several times in succession, then rolled into a thin sheet, in a technique called laminating. The process results in a layered, flaky texture, similar to a puff pastry. </p>
              <a href="#">
                <span>
                  Read More
                </span>
                <img src="assets/images/color-arrow.png" alt="">
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="img-box">
              <img src="assets/images/about-img.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end about section -->
    
    <!-- croissant section  -->
<div class="container-fluid mb-5">
    <div class="row">
      <?php foreach ($produk as $item): ?>
        <div class="col-lg-4 col-md-6 d-flex justify-content-center">
          <div class="box py-3">
              <div class="img-box">
                <img src="assets/images/product/<?php echo htmlspecialchars($item['foto']); ?>" alt="">
              </div>
              <div class="detail-box">
                <h6>
                    <?php echo htmlspecialchars($item['nama']); ?>
                </h6>
                <h5>
                    $<?php echo htmlspecialchars($item['harga']); ?>
                </h5>
                <a href="">
                    BUY NOW
                </a>
              </div>
            </div>
          </div>
      <?php endforeach; ?>
    </div>
    <!-- end croissant section -->

    <!-- info section -->
    <section class="info_section layout_padding2">
      <div class="container">
        <div class="row info_form_social_row">
          <div class="col-md-8 col-lg-9">
            <div class="info_form">
              <form action="">
                <input type="email" placeholder="Enter your email">
                <button>
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-4 col-lg-3">

            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="row info_main_row">
          <div class="col-md-6 col-lg-3">
            <div class="info_links">
              <h4>
                Menu
              </h4>
              <div class="info_links_menu">
                <a href="index.html">
                  Home
                </a>
                <a href="about.html">
                  About
                </a>
                <a href="chocolate.html">
                  Chocolates
                </a>
                <a href="testimonial.html">
                  Testimonial
                </a>
                <a href="contact.html">
                  Contact us
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_insta">
              <h4>
                Instagram
              </h4>
              <div class="insta_box">
                <div class="img-box">
                  <img src="assets/images/insta-img.png" alt="">
                </div>
                <p>
                  long established fact that a reader
                </p>
              </div>
              <div class="insta_box">
                <div class="img-box">
                  <img src="assets/images/insta-img.png" alt="">
                </div>
                <p>
                  long established fact that a reader
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_detail">
              <h4>
                Company
              </h4>
              <p class="mb-0">
                when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h4>
              Contact Us
            </h4>
            <div class="info_contact">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end info_section -->
      <!-- footer section -->
  <footer class="container-fluid footer_section">
    <div class="container">
      <div class="col-md-11 col-lg-8 mx-auto">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->
 <!-- jQery -->
 <script  src="assets/js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script  src="assets/js/bootstrap.js"></script>
  <!-- slick slider -->
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
  <!-- custom js -->
  <script  src="assets/js/custom.js"></script>
</body>
</html>