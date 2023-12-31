<?php
session_start();
require_once 'includes/db_connect.php';
// Ambil data produk dari database
try {
  $query = "SELECT nama, harga, foto FROM produk";
  $stmt = $pdo->query($query);
  $produk = $stmt->fetchAll();
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$isUserAdmin = isset($_SESSION['level']) && $_SESSION['level'] == 'admin';

?>




<?php
  $pageTitle = "Homepage";
  $isUserLoggedIn = isset($_SESSION['username']);
  $assetLoc = "assets";
  $userLoc = "user";
  $publicLoc = "public";
  include 'includes/navbar.php'; // Ganti 'includes' dengan path yang benar
?>

<div id="banner" class="container-fluid" style="background-size: cover;">
    <h1 class="text-center"><strong>Little Bakery</strong></h1>
</div>
    <!-- about section -->

    <section id="about" class="about_section layout_padding ">
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
              <img class="about-image" src="assets/images/about.webp" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end about section -->
    
    <!-- croissant section  -->
    <div id="produk" class="container-fluid mb-5">
        <div class="row">
          <?php foreach ($produk as $item): ?>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
              <div class="box py-3">
                  <div class="img-box">
                    <?php 
                      $imagePath = "assets/images/product/" . htmlspecialchars($item['foto']);
                      if (file_exists($imagePath) && !is_dir($imagePath)) {
                          echo '<img src="'.$imagePath.'" alt="Produk" class="product-image">';
                      } else {
                          // Jika gambar tidak ada, gunakan placeholder
                          echo '<img src="assets/images/product/produk_placeholder.webp" alt="Produk" class="product-image">';
                      }
                    ?>
                  </div>
                  <div class="detail-box">
                    <h6 class="text-center">
                        <?php echo htmlspecialchars($item['nama']); ?>
                    </h6>
                    <h5 class="text-center">
                        $<?php echo htmlspecialchars($item['harga']); ?>
                    </h5>
                    <a href="https://wa.me/6289510380345?text=<?php echo urlencode("Saya tertarik dengan produk " . $item['nama']); ?>" target="_blank">
                        <p class="text-center">BUY NOW</p>
                    </a>
                  </div>
                </div>
              </div>
          <?php endforeach; ?>
        </div>
        <?php if ($isUserAdmin): ?>
          <div class="row">
            <div class="col d-flex justify-content-center">
              <a href="user/add_product.php" class="btn btn-primary">Tambahkan Produk</a>
            </div>
          </div>
        <?php endif; ?>
    </div>
    <!-- end croissant section -->

<?php
  $assetLoc = "assets";
  include 'includes/footer.php'; // Ganti 'includes' dengan path yang benar
?>