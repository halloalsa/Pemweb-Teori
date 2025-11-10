<?php
// Menghubungkan ke database
require 'koneksi.php';

// Menangkap ID kategori dari URL (?id=...)
$id = $_GET['id'];

// Mengambil nama kategori sesuai ID yang dipilih
$kategori = mysqli_query($koneksi, "SELECT * FROM categories WHERE CategoryID='$id'");
$data_kat = mysqli_fetch_array($kategori);
?>

<html>
<head><title><u>PRODUK <?php echo $data_kat['CategoryName']; ?></u></title></head>
<body>
<h2 align="center"><u>Daftar Produk : <i><?php echo $data_kat['CategoryName']; ?></i></u></h2>

<!-- Membuat tabel untuk daftar produk -->
<table border="1" align="center" cellpadding="5" cellspacing="0">
<tr bgcolor="#e6f2ff">
    <th>ID Produk</th>
    <th>Nama Produk</th>
    <th>Harga</th>
</tr>

<?php
$no = 1; // Nomor baris
// Menampilkan produk berdasarkan kategori yang dipilih
$query = mysqli_query($koneksi, "SELECT * FROM products WHERE CategoryID='$id'");

while ($data = mysqli_fetch_array($query)) {
    // Pewarnaan baris: biru muda dan pink muda bergantian
    $warna = ($no % 2 == 0) ? "#e6f2ff" : "#ffe6f2";

    // Menampilkan data produk, nama produk dapat diklik menuju halaman detail
    echo "<tr bgcolor='$warna'>
            <td>{$data['ProductID']}</td>
            <td><a href='detail.php?id={$data['ProductID']}'>{$data['ProductName']}</a></td>
            <td>{$data['UnitPrice']}</td>
          </tr>";
    $no++;
}
?>
</table>

<!-- Tombol kembali ke halaman kategori -->
<p align="center"><a href="index.php">Kembali ke Kategori</a></p>
</body>
</html>
