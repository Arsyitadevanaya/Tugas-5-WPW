<?php
session_start();


if(!isset($_SESSION["user_is_loged_in"])||$_SESSION["user_is_loged_in"]!==true){
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Tautan ke jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<style>
	a {
  	color: inherit;
  	text-decoration: none;
	}
	h3{
		margin-top: 50px;
	}
	</style>	
</head>
<body>
	
	<div class="container-lg">
		<br><br>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
		<a class="btn btn-primary" href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-lg" style="color: #ffffff;"></i></a>
		</div>
	<h3>DATA MAHASISWA D3 TEKNIK INFORMATIKA A PENS 2022</h3>
	<hr>
	<br/>
	

	<a class="btn btn-primary" href="input.php">+ TAMBAH MAHASISWA</a>
	<br/>
	<br/>
	<form  method="post" class="d-flex" role="search" style="justify-content: flex-end;">
  		<div style="display: flex;">
    	<input class="form-control me-2" name="cari_nama" type="search" placeholder="Search" aria-label="Search" style="max-width: 200px;" autofocus autocomplete="off">
    	<button class="btn btn-outline-success" type="submit" name="cari" >Search</button>
  		</div>
	</form><br><br>

	<table class="table table-hover " >
		<tr class="table-secondary" align="center">
			<th>NO</th>
            <th>NRP</th>
			<th>Nama Lengkap</th>
			<th>Jenis Kelamin</th>
			<th>Jurusan</th>
			<th>Email Student</th>
            <th>Nomor HP</th>
            <th>Foto</th>
            <th>Ukuran</th>
            <th>Download</th>
            <th>Keterangan</th>
		</tr>
		<?php 
		include 'koneksi.php';
		if(isset($_POST['cari'])){
			$caridata = $_POST['cari_nama'];
			$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$caridata%' OR 
					nrp LIKE '%$caridata%' OR email LIKE '%$caridata%' OR no_hp LIKE '%$caridata%' OR
					jenis_kelamin LIKE '%$caridata%' OR jurusan LIKE '%$caridata%'";
		}else{
			$query = "SELECT * FROM mahasiswa";
		}
		
		$no = 1;
		
		$data = mysqli_query($conn,$query);
		while($d = mysqli_fetch_array($data)){
			?>
			<tr >
				<td><?php echo $no++; ?></td>
                <td><?php echo $d['nrp']; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['jenis_kelamin']; ?></td>
                <td><?php echo $d['jurusan']; ?></td>
                <td><?php echo $d['email']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><img width="100px" height="150px" src="<?php echo "Photo/".$d['foto']; ?>"></td>
				<td align="center"><button class="btn btn-warning btn-sm"><?php echo round($d['size'] / 1024, 2); ?>KB</button></td>

                <td align="center"><a  href="download.php?filename=<?=$d['foto']?>"><i class="fa-sharp fa-solid fa-download fa-lg" style="color: #1100ff;"></i></a></td>
				<td align="center">
					<br>
					<a href="update.php?id=<?php echo $d['id']; ?>">
						<button type="button" class="btn btn-success btn-sm">UPDATE</button>
					</a><br><br>
					<a href="hapus.php?id=<?php echo $d['id']; ?>">
						<button type="button" class="btn btn-danger btn-sm">DELETE</button>
					</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</div>

<?php
if(isset($_POST['cari'])){
    $cari_nama = $_POST['cari'];
	
    $kirim = "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari_nama%'";
	
}


?>
<br><br><br>
</body>
</html>