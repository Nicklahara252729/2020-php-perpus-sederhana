<?php
//memanggil file koneksi
include('koneksi.php');

//memeriksa apakah terdapat id atau tidak
if(isset($_GET['id'])){
	
	//mengambil parameter id
    $id = $_GET['id'];

    //proses penghapusan data mahasiswa berdasarkan id / kode mahasiswa
    $sql_del = mysqli_query($host,"delete from mahasiswa where kd_mahasiswa='$id'");
    if($sql_del){ ?>
        <script>alert('data berhasil dihapus'); window.location.href='mahasiswa.php';</script>
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
			<div class=" col-md-12 mt-5">
				
				<table class="table">
					<thead>
						<tr>
							<th>Kode Buku</th>
							<th>Judul Buku</th>
							<th>Kode Kategori</th>
							<th>Kode Penerbit</th>
							<th>Nama Penulis</th>
							<th>Jumlah Halaman</th>
							<th>Tahun Terbit</th>
							<th>Loker Rakbuku</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
										//query menampilkan data mahasiswa
                                        $sql = mysqli_query($host,'select * from buku');

                                        //menampilkan data mahasiswa menggunakan perulangan
                                        foreach($sql as $key => $val ){ ?>
                                            <tr>
                                                <td><?= $val['kd_buku'] ?></td>
                                                
                                                <td><?= $val['judul_buku'] ?></td>
                                                <td><?= $val['kd_kategori'] ?></td>
                                                <td><?= $val['kd_penerbit'] ?></td>
                                                <td><?= $val['nama_penulis'] ?></td>
												<td><?= $val['jlh_halaman'] ?></td>
												<td><?= $val['thn_terbit'] ?></td>
												<td><?= $val['lok_rakbuku'] ?></td>
                                                <td>
                                                    <a href="edit-mahasiswa.php?id=<?= $val['kd_buku']; ?>" class="btn btn-warning">Edit</a>
                                                    <a href="?id=<?= $val['kd_buku']; ?>" onclick="return confirm('Data akan dihapus. Lanjukan ?');" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php }
                                    ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>