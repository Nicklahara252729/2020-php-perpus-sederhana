<?php
//memanggil file koneksi
include('koneksi.php');

//cek apakah terdapat form submit dengan parameternya nama mahasiswa
if(isset($_POST['nama_mahasiswa'])){
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$jurusan = $_POST['jurusan'];
	$alamat = $_POST['alamat'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenkel = $_POST['jenkel'];

	//cek apakah sudah terdapat nama mahasiswa tersebut atau belum
	$cekData = mysqli_query($host,"select * from mahasiswa where nama_mahasiswa='$nama_mahasiswa'");
	if(mysqli_num_rows($cekData) > 0){ ?>
	<!-- jika sudah ada proses penyimpanan data langsung terenti -->
	<script type="text/javascript">alert('Data Mahasiswa Sudah Ada');</script>

	<?php }else{
		//jika belum ada maka proses penyimpanan data berlanjut
		$insertData = mysqli_query($host,"insert into mahasiswa set nama_mahasiswa='$nama_mahasiswa',jurusan='$jurusan',alamat='$alamat',tgl_lahir='$tgl_lahir',jenkel='$jenkel'");
		if($insertData){ ?>
			<script type="text/javascript">alert('Data berhasil disimpan'); window.location.href='mahasiswa.php';</script>
		<?php }else{ ?>
			<script type="text/javascript">alert('Data gagal disimpan');</script>
		<?php }
		}
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
				    <label for="nama_mahasiswa">Nama Mahasiswa</label>
				    <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" required="">
				  </div>

				  <div class="form-group">
				    <label for="jurusan">Jurusan</label>
				    <input type="text" class="form-control" id="jurusan" name="jurusan" required="">
				  </div>

				  <div class="form-group">
				    <label for="alamat">Alamat</label>
				    <input type="text" class="form-control" id="alamat" name="alamat" required="">
				  </div>

				  <div class="form-group">
				    <label for="tgl_lahir">Tanggal Lahir</label>
				    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required="">
				  </div>

				  <div class="form-group">
				    <label for="jenkel">Jenis Kelamin</label>
				    <select class="form-control" required="" name="jenkel">
				    	<option value="l">Laki - laki</option>
				    	<option value="p">Perempuan</option>
				    </select>
				  </div>
				  <button type="submit" class="btn btn-primary float-right">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>