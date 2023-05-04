<?php
include 'koneksi.php';
$id = $_GET['id'];

// Dapatkan informasi file sebelum menghapus data dari database
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);
$nama_file = $d['foto'];

// Hapus file terkait
unlink('Photo/' . $nama_file);

// Hapus data dari database
$query = "DELETE FROM mahasiswa WHERE id='$id'";
if (mysqli_query($conn, $query)) {
    echo "<script>alert('Menghapus');window.location.href='tampilan.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
