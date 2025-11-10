<?php
include 'koneksi.php';

if (isset($_POST['beli'])) {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $query = mysqli_query($conn, "SELECT * FROM products WHERE ProductID='$id_produk'");
    $data = mysqli_fetch_array($query);

    $item = [
        'id' => $data['ProductID'],
        'nama' => $data['ProductName'],
        'harga' => $data['UnitPrice'],
        'jumlah' => $jumlah
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = $item;
}
?>
<html>
<head><title>Shopping Cart</title></head>
<body>
<h2 align="center"><u>KERANJANG BELANJA</h2></u>
<table border="1" align="center" cellpadding="5" cellspacing="0">
<tr bgcolor="#e6f2ff">
    <th>No</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Subtotal</th>
</tr>
<?php
$total = 0;
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $no = 1;
    foreach ($_SESSION['cart'] as $item) {
        $warna = ($no % 2 == 0) ? "#e6f2ff" : "#ffe6f2";
        $subtotal = $item['harga'] * $item['jumlah'];
        $total += $subtotal;
        echo "<tr bgcolor='$warna'>
                <td>$no</td>
                <td>{$item['nama']}</td>
                <td>{$item['harga']}</td>
                <td>{$item['jumlah']}</td>
                <td>$subtotal</td>
              </tr>";
        $no++;
    }
    echo "<tr bgcolor='#e6f2ff'>
            <td colspan='4' align='right'><b>Total</b></td>
            <td><b>$total</b></td>
          </tr>";
} else {
    echo "<tr><td colspan='5' align='center'>Keranjang masih kosong</td></tr>";
}
?>
</table>
<p align="center"><a href="index.php">Kembali ke Kategori</a></p>
</body>
</html>
