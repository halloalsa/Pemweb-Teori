<?php
// Menghubungkan ke database
require 'koneksi.php';

// Menangkap ID produk dari URL
$id = $_GET['id'];

// Mengambil detail produk berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM products WHERE ProductID='$id'");
$data = mysqli_fetch_array($query);
?>

<html>
<head><title>Detail Produk</title></head>
<body>
<h2 align="center"><u>DETAIL PRODUK</u></h2>

<!-- Menampilkan data detail produk -->
<table border="1" align="center" cellpadding="5" cellspacing="0">
    <tr bgcolor="#e6f2ff"><td><strong>ID Produk</strong></td><td><?php echo $data['ProductID']; ?></td></tr>
    <tr bgcolor="#ffe6f2"><td><strong>Produk</strong></td><td><?php echo $data['ProductName']; ?></td></tr>
    <tr bgcolor="#e6f2ff"><td><strong>Harga</strong></td><td><?php echo $data['UnitPrice']; ?></td></tr>
    <tr bgcolor="#ffe6f2"><td><strong>Stok</strong></td><td><?php echo $data['UnitsInStock']; ?></td></tr>
</table>

<br>

<!-- Form untuk memasukkan jumlah yang akan dibeli -->
<form method="post" action="cart.php" align="center">
    <!-- Menyimpan ID produk secara tersembunyi -->
    <input type="hidden" name="id_produk" value="<?php echo $data['ProductID']; ?>">
    Jumlah : <input type="number" name="jumlah" min="1" required> <!-- Input jumlah produk -->
    <input type="submit" name="beli" value="Beli"> <!-- Tombol untuk membeli -->
</form>

<!-- Tombol kembali ke halaman sebelumnya -->
<p align="center"><a href="produk.php?id=<?php echo $data['CategoryID']; ?>">Kembali</a></p>
</body>
</html>
