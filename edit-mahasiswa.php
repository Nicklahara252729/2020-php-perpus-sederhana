<?php
//memanggil file koneksi
include('koneksi.php');

//cek apakah terdapat form submit dengan parameternya nama mahasiswa
if(isset($_POST['nama_mahasiswa'])){
	$id = $_POST['id'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$jurusan = $_POST['jurusan'];
	$alamat = $_POST['alamat'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenkel = $_POST['jenkel'];

		//melakukan proses update data
		$insertData = mysqli_query($host,"update mahasiswa set nama_mahasiswa='$nama_mahasiswa',jurusan='$jurusan',alamat='$alamat',tgl_lahir='$tgl_lahir',jenkel='$jenkel' where kd_mahasiswa='$id'");
		if($insertData){ ?>
			<script type="text/javascript">alert('Data berhasil disimpan'); window.location.href='mahasiswa.php';</script>
		<?php }else{ ?>
			<script type="text/javascript">alert('Data gagal disimpan');</script>
		<?php }
	}

//mengambil data berdasarkan parameter id / kode mahasiswa 
//untuk di tampilkan di dalam form
if(isset($_GET['id'])){
    $id = $_GET['id'];
                        $sql = mysqli_query($host,"select * from mahasiswa where kd_mahasiswa='$id'");
                        foreach($sql as $row){
                            $val_nama_mahasiswa = $row['nama_mahasiswa'];
                            $val_jurusan = $row['jurusan'];
                            $val_alamat = $row['alamat'];
                            $val_tgl_lahir = $row['tgl_lahir'];
                            $val_jenkel = $row['jenkel'];
                            $id = $_GET['id'];
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
					<input type="hidden" name="id" id="id" value="<?= $id; ?>">
				  <div class="form-group">
				    <label for="nama_mahasiswa">Nama Mahasiswa</label>
				    <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" required="" value="<?= $val_nama_mahasiswa ?>">
				  </div>

				  <div class="form-group">
				    <label for="jurusan">Jurusan</label>
				    <input type="text" class="form-control" id="jurusan" name="jurusan" required="" value="<?= $val_jurusan ?>">
				  </div>

				  <div class="form-group">
				    <label for="alamat">Alamat</label>
				    <input type="text" class="form-control" id="alamat" name="alamat" required="" value="<?= $val_alamat ?>">
				  </div>

				  <div class="form-group">
				    <label for="tgl_lahir">Tanggal Lahir</label>
				    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required="" value="<?= $val_tgl_lahir ?>">
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