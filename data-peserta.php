<?php
session_start();
include 'koneksi.php';
if ($_SESSION['stat_login'] != true) {
	echo '<script>window.location="login.php"</script>';
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSB Online | Admin Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<header>
		<h1>Admin PSB Online</h1>
		<ul>
			<li><a href="beranda.php">Beranda</a></li>
			<li><a href="data-peserta.php">Data Peserta</a></li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</header>
	<section class="content">
		<h2>Data Peserta</h2>
		<div class="box">
			<a href="cetak-peserta.php" target="_blank" class="btn-cetak">Print</a>
			<table class="table" border="1">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Pendaftaran</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Foto</th>
						<th>Foto KK</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$list_peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran");
					while ($row = mysqli_fetch_array($list_peserta)) {
					?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['id_pendaftaran'] ?></td>
							<td><?php echo $row['nama'] ?></td>
							<td><?php echo $row['jenis_kelamin'] ?></td>
							<td><img src="<?php echo $row['foto'] ?>" style="height:100px;width:100px;" /></td>
							<td><img src="<?php echo $row['foto_kk'] ?>" style="height:100px;width:100px;" /></td>
							<td>
								<a href="detail-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>">Detail</a> ||
								<a href="hapus-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>" onclick="return confirm('Anda ingin menghapus data yang dipilih?')">Hapus</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>

</body>

</html>