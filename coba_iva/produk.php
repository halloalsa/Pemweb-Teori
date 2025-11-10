<?php
include 'koneksi.php';
$id = $_GET['id'];
$kategori = mysqli_query($conn, "SELECT * FROM categories WHERE CategoryID='$id'");
$data_kat = mysqli_fetch_array($kategori);
?>
<html>
<head><title><u>PRODUK <?php echo $data_kat['CategoryName']; ?></title></head></u>
<body>
<h2 align="center"><u>Daftar Produk : <i> <?php echo $data_kat['CategoryName']; ?></h2> </i></u>
<table border="1" align="center" cellpadding="5" cellspacing="0">
<tr bgcolor="#e6f2ff">
    <th>ID Produk</th>
    <th>Nama Produk</th>
    <th>Harga</th>
</tr>
<?php
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM products WHERE CategoryID='$id'");
while ($data = mysqli_fetch_array($query)) {
    $warna = ($no % 2 == 0) ? "#e6f2ff" : "#ffe6f2";
    echo "<tr bgcolor='$warna'>
            <td>{$data['ProductID']}</td>
            <td><a href='detail.php?id={$data['ProductID']}'>{$data['ProductName']}</a></td>
            <td>{$data['UnitPrice']}</td>
          </tr>";
    $no++;
}
?>
</table>
<p align="center"><a href="index.php">Kembali ke Kategori</a></p>
</body>
</html>
