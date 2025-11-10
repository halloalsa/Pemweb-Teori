<?php
// Menghubungkan ke database
require 'koneksi.php';

// Memulai session untuk menyimpan data keranjang
session_start();

// Mengecek apakah tombol beli ditekan
if (isset($_POST['beli'])) {
    // Menangkap data dari form di halaman detail.php
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    // Mengambil data produk dari database berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM products WHERE ProductID='$id_produk'");
    $data = mysqli_fetch_array($query);

    // Menyimpan data produk ke dalam array
    $item = [
        'id' => $data['ProductID'],
        'nama' => $data['ProductName'],
        'harga' => $data['UnitPrice'],
        'jumlah' => $jumlah
    ];

    // Jika keranjang belum ada, buat array baru
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Menambahkan produk baru ke keranjang
    $_SESSION['cart'][] = $item;
}
?>

<html>
<head><title>Shopping Cart</title></head>
<body>
<h2 align="center"><u>KERANJANG BELANJA</u></h2>

<!-- Membuat tabel tampilan keranjang -->
<table border="1" align="center" cellpadding="5" cellspacing="0">
<tr bgcolor="#e6f2ff">
    <th>No</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Subtotal</th>
</tr>

<?php
$total = 0; // Variabel untuk menghitung total belanja

// Mengecek apakah session cart ada dan tidak kosong
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $no = 1;
    // Menampilkan setiap item dalam keranjang
    foreach ($_SESSION['cart'] as $item) {
        $warna = ($no % 2 == 0) ? "#e6f2ff" : "#ffe6f2"; // Warna baris bergantian
        $subtotal = $item['harga'] * $item['jumlah']; // Hitung subtotal
        $total += $subtotal; // Tambahkan ke total keseluruhan

        // Menampilkan baris produk dalam tabel
        echo "<tr bgcolor='$warna'>
                <td>$no</td>
                <td>{$item['nama']}</td>
                <td>{$item['harga']}</td>
                <td>{$item['jumlah']}</td>
                <td>$subtotal</td>
              </tr>";
        $no++;
    }

    // Menampilkan total keseluruhan
    echo "<tr bgcolor='#e6f2ff'>
            <td colspan='4' align='right'><b>Total</b></td>
            <td><b>$total</b></td>
          </tr>";
} else {
    // Jika keranjang kosong
    echo "<tr><td colspan='5' align='center'>Keranjang masih kosong</td></tr>";
}
?>
</table>

<!-- Tombol kembali ke halaman utama -->
<p align="center"><a href="index.php">Kembali ke Kategori</a></p>
</body>
</html>
