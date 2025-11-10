<?php
// Mengimpor file koneksi agar bisa mengakses database.
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Mengatur karakter encoding agar mendukung huruf internasional -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Agar tampilan responsif di semua perangkat -->
    <title>Daftar Kategori</title> <!-- Judul halaman -->
</head>

<body>
<h2 align="center"><u>DAFTAR KATEGORI PRODUK</u></h2>

<!-- Membuat tabel untuk menampilkan daftar kategori -->
<table border="1" align="center" cellpadding="5" cellspacing="0">
<tr bgcolor="#e6f2ff"> <!-- Warna biru muda untuk header -->
    <th>ID Kategori</th>
    <th>Nama Kategori</th>
</tr>

<?php
$no = 1; // Membuat nomor urut untuk pewarnaan baris tabel

// Mengambil semua data dari tabel categories
$query = mysqli_query($koneksi, "SELECT * FROM categories");

// Menampilkan hasil query baris demi baris
while ($data = mysqli_fetch_array($query)) {
    // Mengatur warna baris: genap biru muda, ganjil pink muda
    $warna = ($no % 2 == 0) ? "#e6f2ff" : "#ffe6f2";

    // Menampilkan baris data kategori, nama kategori bisa diklik menuju produk.php
    echo "<tr bgcolor='$warna'>
            <td>{$data['CategoryID']}</td>
            <td><a href='produk.php?id={$data['CategoryID']}'>{$data['CategoryName']}</a></td>
          </tr>";
    $no++;
}
?>
</table>
</body>
</html>
