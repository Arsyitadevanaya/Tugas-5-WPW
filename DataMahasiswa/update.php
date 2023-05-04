<?php
session_start();

include 'koneksi.php';

if(!isset($_SESSION["user_is_loged_in"]) || $_SESSION["user_is_loged_in"]!==true){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['no_hp'];
    $foto_lama = $d['foto'];
    $foto = $_FILES['photo']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['photo']['size'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $ekstensi_diperbolehkan = array('png', 'jpg');

    if ($_FILES['photo']['error'] === 4 ) {
        // Tidak ada file yang diunggah
        $query = "UPDATE mahasiswa SET nrp='$nrp', nama='$nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', email='$email', no_hp='$nomor_hp' WHERE id='$id'";
        if (mysqli_query($conn, $query)) {
            echo "<script>window.location.href='update.php?id=$id';</script>";
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
            if ($ukuran < 2044070) {
                // Hapus file lama
                unlink('Photo/' . $foto_lama);

                // Simpan file yang diunggah baru
                move_uploaded_file($file_tmp, 'Photo/' . $foto);

                $query = "UPDATE mahasiswa SET nrp='$nrp', nama='$nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', email='$email', no_hp='$nomor_hp', foto='$foto', tipe='$ekstensi', size='$ukuran' WHERE id='$id'";
                if (mysqli_query($conn, $query)) {
                    
                    echo "<script>window.location.href='update.php?id=$id';</script>";
                    exit;
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Ukuran file terlalu besar, maksimal 1044070 byte (1 MB)";
            }
        } else {
            echo "Ekstensi file tidak diizinkan, hanya ekstensi JPG dan PNG yang diperbolehkan";
        }
    }

    mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .container-lg{
            padding-top: 80px;
        }
    </style>
</head>
<body>
    <div class="container-lg">
        <h1 align="center" >Update Data</h1><br><br>
        <div class="container">
            <div class="row">
                <div class="col text-center" >
                    <img width="150px" height="200px" src="<?php echo "Photo/".$d['foto']; ?>"><br><br>
                
                </div>
                <div class="col-sm-10">
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" value="<?php echo $d['nama']; ?>" class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NRP</label>
                            <div class="col-sm-10">
                                <input type="text" name="nrp" value="<?php echo $d['nrp']; ?>" class="form-control">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($d['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?> id="gridRadios1" >
                                    <label class="form-check-label" for="gridRadios1">Perempuan</label>
                                </div>
                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" <?php if ($d['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?> id="gridRadios2" >
                                    <label class="form-check-label" for="gridRadios2">
                                        Laki-laki
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="jurusan" >
                                    <option selected>Pilih Jurusan...</option>
                                    <option  value="Teknik Informatika" <?php if ($d['jurusan'] == 'Teknik Informatika') echo 'selected'; ?>>Teknik Informatika</option>
                                    <option  value="Teknik Komputer" <?php if ($d['jurusan'] == 'Teknik Komputer') echo 'selected'; ?>>Teknik Komputer</option>
                                    <option value="Teknik Telekomunikasi"<?php if ($d['jurusan'] == 'Teknik Telekomunikasi') echo 'selected'; ?>>Teknik Telekomunikasi</option>
                                    <option  value="Teknik Elektro" <?php if ($d['jurusan'] == 'Teknik Elektro') echo 'selected'; ?>>Teknik Elektro</option>
                                    <option  value="Teknik Elektro Industri" <?php if ($d['jurusan'] == 'Teknik Elektro Industri') echo 'selected'; ?>>Teknik Elektro Industri</option>
                                    <option  value="Teknologi Multimedia Broadcasting" <?php if ($d['jurusan'] == 'Teknologi Multimedia Broadcasting') echo 'selected'; ?>>Teknologi Multimedia Broadcasting.</option>
                                    <option  value="Teknik Mekatronika" <?php if ($d['jurusan'] == 'Teknik Mekatronika') echo 'selected'; ?>>Teknik Mekatronika</option>
                                    <option  value="Teknologi Game" <?php if ($d['jurusan'] == 'Teknologi Game') echo 'selected'; ?>>Teknologi Game</option>
                                    <option value="Teknologi Rekayasa Multimedia" <?php if ($d['jurusan'] == 'Teknologi Rekayasa Multimedia') echo 'selected'; ?>>Teknologi Rekayasa Multimedia</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="<?php echo $d['email']; ?>"  class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nomor HP</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_hp" value="<?php echo $d['no_hp']; ?>"  class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Update Foto</label>
                            <div class="col-sm-10">
                                <input type="file" name="photo" class="form-control" >
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-danger" href="tampilan.php" role="button">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </div>
</body>
</html>