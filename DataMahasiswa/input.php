<?php

session_start();


if(!isset($_SESSION["user_is_loged_in"])||$_SESSION["user_is_loged_in"]!==true){
    header("Location: login.php");
    exit;
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
        <h1 align="center" >Tambahkan Data</h1><br><br>

    <form action="tambah_aksi.php" enctype="multipart/form-data" method="post">
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" name="nama"  class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NRP</label>
            <div class="col-sm-10">
                <input type="text" name="nrp"   class="form-control" id="inputEmail3">
            </div>
        </div>
        
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="gridRadios1" >
                    <label class="form-check-label" for="gridRadios1">
                        Perempuan
                    </label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="gridRadios2" >
                    <label class="form-check-label" for="gridRadios2">
                        Laki-laki
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
            <select class="form-select" name="jurusan" id="inlineFormSelectPref">
                <option selected>Pilih Jurusan...</option>
                <option  value="Teknik Informatika">Teknik Informatika</option>
                <option  value="Teknik Komputer">Teknik Komputer</option>
                <option  value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                <option  value="Teknik Elektro">Teknik Elektro</option>
                <option  value="Teknik Elektro Industri">Teknik Elektro Industri</option>
                <option  value="Teknologi Multimedia Broadcasting">Teknologi Multimedia Broadcasting.</option>
                <option  value="Teknik Mekatronika">Teknik Mekatronika</option>
                <option value="Teknologi Game">Teknologi Game</option>
                <option  value="Teknologi Rekayasa Multimedia">Teknologi Rekayasa Multimedia</option>
            </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email"  class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor HP</label>
            <div class="col-sm-10">
                <input type="text" name="no_hp"  class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Upload Foto</label>
            <div class="col-sm-10">
                <input type="file" name="photo"  class="form-control" id="inputEmail3">
            </div>
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-danger" href="tampilan.php" role="button">Batal</a>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </div>



    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>