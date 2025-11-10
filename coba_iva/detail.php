<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM products WHERE ProductID='$id'");
$data = mysqli_fetch_array($query);
?>
<html>
<head><title>Detail Produk</title></head>
<body>
<h2 align="center"><u>DETAIL PRODUK</h2></u>
<table border="1" align="center" cellpadding="5" cellspacing="0">
    <tr bgcolor="#e6f2ff"><td><strong> ID Produk </td><td><?php echo $data['ProductID']; ?></td></tr>
    <tr bgcolor="#ffe6f2"><td><strong> Produk </td><td><?php echo $data['ProductName']; ?></td></tr>
    <tr bgcolor="#e6f2ff"><td><strong> Harga</td><td><?php echo $data['UnitPrice']; ?></td></tr>
    <tr bgcolor="#ffe6f2"><td><strong> Stok</td><td><?php echo $data['UnitsInStock']; ?></td></tr>
</table>

<br>
<form method="post" action="cart.php" align="center">
    <input type="hidden" name="id_produk" value="<?php echo $data['ProductID']; ?>">
    Jumlah : <input type="number" name="jumlah" min="1" required>
    <input type="submit" name="beli" value="Beli">
</form>

<p align="center"><a href="produk.php?id=<?php echo $data['CategoryID']; ?>">Kembali</a></p>
</body>
</html>
