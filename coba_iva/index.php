<?php
include 'koneksi.php';
?>
<html>
<head><title>Daftar Kategori</title></head>
<body>
<h2 align="center"><u>DAFTAR KATEGORI PRODUK</h2></u>
<table border="1" align="center" cellpadding="5" cellspacing="0">
<tr bgcolor="#e6f2ff">
    <th>ID Kategori</th>
    <th>Nama Kategori</th>
</tr>
<?php
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM categories");
while ($data = mysqli_fetch_array($query)) {
    $warna = ($no % 2 == 0) ? "#e6f2ff" : "#ffe6f2";
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
