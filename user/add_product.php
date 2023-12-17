<?php
session_start();

if (!isset($_SESSION['level']) || $_SESSION['level'] != 'admin') {
    // Redirect ke halaman login atau halaman lain
    header('Location: login.php');
    exit();
}

// Sambungan ke database
require '../includes/db_connect.php';

// Query untuk mengambil data kategori
$query = "SELECT id, nama FROM kategori"; // Ganti 'nama' dengan nama field yang sesuai di tabel kategori
$stmt = $pdo->prepare($query);
$stmt->execute();
$kategoriList = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
  $assetLoc = "../assets";
  $userLoc = ".";
  $publicLoc = ".";
  $pageTitle = "Tambah Produk";
  $isUserLoggedIn = isset($_SESSION['username']);
  include '../includes/navbar.php'; // Ganti 'includes' dengan path yang benar
?>

<div class="container">
    <h2>Tambah Produk</h2>
    <form action="path_to/submit_add_product.php" method="post" enctype="multipart/form-data">
        <<div class="form-group">
            <label for="kategori_id">Kategori:</label>
            <select class="form-control" id="kategori_id" name="kategori_id">
                <?php foreach ($kategoriList as $kategori): ?>
                    <option value="<?php echo $kategori['id']; ?>">
                        <?php echo $kategori['nama']; // Pastikan ini sesuai dengan nama field di tabel kategori ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama Produk:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto Produk:</label>
            <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <div class="form-group">
            <label for="detail">Detail Produk:</label>
            <textarea class="form-control" id="detail" name="detail"></textarea>
        </div>
        <div class="form-group">
            <label for="ketersediaan_stok">Ketersediaan Stok:</label>
            <select class="form-control" id="ketersediaan_stok" name="ketersediaan_stok">
                <option value="tersedia">Tersedia</option>
                <option value="habis">Habis</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan Produk</button>
    </form>
</div>

<?php
  $assetLoc = "../assets";
  include '../includes/footer.php'; // Ganti 'includes' dengan path yang benar
?>

