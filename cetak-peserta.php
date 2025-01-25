<?php

include 'koneksi.php';

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSB Online | Cetak Peserta</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
		window.print();
	</script>
</head>

<body>

	<h2>Laporan Pendaftaran</h2>
	<table class="table" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Pendaftaran</th>
				<th>Nama</th>
				<th>Tempat</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Alamat</th>
				<th>Foto</th>
				<th>Foto Kartu Keluarga</th>
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
					<td><?php echo $row['tempat_lahir'] ?></td>
					<td><?php echo $row['tanggal_lahir'] ?></td>
					<td><?php echo $row['jenis_kelamin'] ?></td>
					<td><?php echo $row['agama'] ?></td>
					<td><?php echo $row['alamat'] ?></td>
					<td><img src="<?php echo $row['foto'] ?>" style="height:100px;width:100px;" /></td>
					<td><img src="<?php echo $row['foto_kk'] ?>" style="height:100px;width:100px;" /></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

</body>

</html>