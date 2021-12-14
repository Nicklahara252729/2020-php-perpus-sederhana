<?php
//memanggil file koneksi
include('koneksi.php');

//cek apakah terdapat form submit dengan parameternya nama mahasiswa
if(isset($_POST['kd_mahasiswa'])){
	$kd_mahasiswa = $_POST['kd_mahasiswa'];
	$tgl_pinjam = $_POST['tgl_pinjam'];
	$tgl_kembali = $_POST['tgl_kembali'];
	$kd_buku = $_POST['kd_buku'];


		$insertData = mysqli_query($host,"insert into peminjaman set tgl_pinjam='$tgl_pinjam',tgl_kembali='$tgl_kembali',kd_mahasiswa='$kd_mahasiswa',kd_buku='$kd_buku'");
		if($insertData){ ?>
			<script type="text/javascript">alert('Data berhasil disimpan'); window.location.href='index.php';</script>
		<?php }else{ ?>
			<script type="text/javascript">alert('Data gagal disimpan');</script>
		<?php }
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Peminjaman Buku</title>
	<link href="assets/style.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Sistem Peminjaman Buku</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-item nav-link" href="index.php">Beranda </a>
	      <a class="nav-item nav-link" href="buku.php">Buku</a>
	      <a class="nav-item nav-link" href="mahasiswa.php">Mahasiswa</a>
	      <a class="nav-item nav-link" href="pengembalian.php">Pengembalian</a>
	    </div>
	  </div>
	</nav>
	<div class="container ">
		<div class="row">
			<div class="offset-2 col-md-8 mt-5">
				<form method="post" target="_self"> 
				  <div class="form-group">
				    <label for="kd_mahasiswa">Kode Mahasiswa</label>
				    <input type="text" class="form-control" name="kd_mahasiswa" id="kd_mahasiswa" required="">
				  </div>

				  <div class="form-group">
				    <label for="tgl_pinjam">Tanggal Pinjam</label>
				    <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required="">
				  </div>

				  <div class="form-group">
				    <label for="tgl_kembali">Tanggal Kembali</label>
				    <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required="">
				  </div>

				  <div class="form-group">
				    <label for="kd_buku">Kode Buku</label>
				    <input type="text" class="form-control" id="kd_buku" name="kd_buku" required="">
				  </div>

				  <button type="submit" class="btn btn-primary float-right">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>