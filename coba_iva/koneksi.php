<?php
// Baris 1: Tag pembuka PHP agar bisa menjalankan kode PHP di dalam file.

// Baris 2: Menyimpan alamat host server MySQL (biasanya localhost jika pakai XAMPP).
$hostname = "localhost";

// Baris 3: Menyimpan username untuk login ke MySQL.
$username = "root";

// Baris 4: Menyimpan password MySQL (kosong jika menggunakan XAMPP default).
$password = "";

// Baris 5: Menyimpan nama database yang digunakan, di sini database bernama "nwind".
$database = "nwind";

// Baris 7: Membuat koneksi ke MySQL menggunakan fungsi mysqli_connect().
$koneksi = mysqli_connect($hostname, $username, $password, $database);

// Baris 8–10: Mengecek apakah koneksi berhasil atau gagal.
if (!$koneksi) { // Jika koneksi gagal
    // Menampilkan pesan error dan menghentikan eksekusi program.
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Baris 12: Tag penutup PHP (opsional, tapi sering dipakai untuk menandai akhir skrip).
?>
