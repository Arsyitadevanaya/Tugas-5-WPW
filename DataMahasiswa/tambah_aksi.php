<?php

include 'koneksi.php';

$nama = $_POST['nama'];
$nrp = $_POST['nrp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$jurusan = $_POST['jurusan'];
$foto = $_FILES['photo']['name'];
$x = explode('.', $foto);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['photo']['size'];
$file_tmp = $_FILES['photo']['tmp_name'];
$ekstensi_diperbolehkan = array('png', 'jpg');



if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
    if ($ukuran < 2044070) {
        move_uploaded_file($file_tmp, 'Photo/' . $foto);

        $query = "INSERT INTO mahasiswa (nrp, nama, jenis_kelamin, jurusan, email, no_hp, foto, tipe, size,id) VALUES ('$nrp', '$nama', '$jenis_kelamin', '$jurusan', '$email', '$no_hp', '$foto', '$ekstensi', '$ukuran','')";

        if (mysqli_query($conn, $query)) {
            header("location:tampilan.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Ukuran file terlalu besar, maksimal 1044070 byte (1 MB)";
    }
} else {
    echo "Ekstensi file tidak diizinkan, hanya ekstensi JPG dan PNG yang diperbolehkan";
}


?>
