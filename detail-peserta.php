<?php
session_start();
include 'koneksi.php';
if ($_SESSION['stat_login'] != true) {
	echo '<script>window.location="login.php"</script>';
}

$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($peserta)

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
		<h2>Detail Peserta</h2>
		<div class="box">
			<table class="table-cetak" border="0">
				<tr>
					<td><img src="<?php echo $p->foto ?>" style="height:100px;width:100px;" /></td>
				</tr>
				<tr>
					<td>Kode Pendaftaran</td>
					<td>:</td>
					<td><?php echo $p->id_pendaftaran ?></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td><?php echo $p->nama ?></td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td>:</td>
					<td><?php echo $p->tempat_lahir ?></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><?php echo $p->tanggal_lahir ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?php echo $p->jenis_kelamin ?></td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>:</td>
					<td><?php echo $p->agama ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $p->alamat ?></td>
				</tr>
			</table>
		</div>
	</section>

</body>

</html>