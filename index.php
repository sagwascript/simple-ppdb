<?php

include 'koneksi.php';
if (isset($_POST['submit'])) {

	$getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_pendaftaran");
	$d = mysqli_fetch_object($getMaxId);
	$generateId = 'P' . date('Y') . sprintf("%05s", $d->id + 1);
	$tanggal_daftar = date('Y-m-d');

	$nama = $_POST['nama'];
	$nisn = $_POST['nisn'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$status_dalam_keluarga = $_POST['status_dalam_keluarga'];
	$anak_ke = $_POST['anak_ke'];
	$alamat = $_POST['alamat'];
	$no_wa = $_POST['no_wa'];
	$email = $_POST['email'];
	$nik = $_POST['nik'];
	$no_kk = $_POST['no_kk'];
	$tanggal_terbit_kk = $_POST['tanggal_terbit_kk'];
	$sekolah_asal = $_POST['sekolah_asal'];
	$npsn_sekolah_asal = $_POST['npsn_sekolah_asal'];
	$nama_ayah = $_POST['nama_ayah'];
	$nama_ibu = $_POST['nama_ibu'];

	$extensions_arr = array("jpg", "jpeg", "png", "gif");
	$target_dir = "storage/";

	$foto = $_FILES['foto']['tmp_name'];
	$foto_extension = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
	if (!in_array($foto_extension, $extensions_arr)) {
		return;
	}
	$image_base64 = base64_encode(file_get_contents($foto));
	$foto_base64 = 'data:image/' . $foto_extension . ';base64,' . $image_base64;

	$foto_kk = $_FILES['foto_kk']['tmp_name'];
	$foto_kk_extension = strtolower(pathinfo($_FILES['foto_kk']['name'], PATHINFO_EXTENSION));
	if (!in_array($foto_kk_extension, $extensions_arr)) {
		return;
	}
	$image_base64 = base64_encode(file_get_contents($foto_kk));
	$foto_kk_base64 = 'data:image/' . $foto_kk_extension . ';base64,' . $image_base64;

	$columns_arr = array(
		"id_pendaftaran",
		"tgl_daftar",
		"nama",
		"nisn",
		"tempat_lahir",
		"tanggal_lahir",
		"jenis_kelamin",
		"agama",
		"status_dalam_keluarga",
		"anak_ke",
		"alamat",
		"no_wa",
		"email",
		"nik",
		"no_kk",
		"tanggal_terbit_kk",
		"sekolah_asal",
		"npsn_sekolah_asal",
		"nama_ayah",
		"nama_ibu",
		"foto",
		"foto_ekstensi",
		"foto_kk",
		"foto_kk_ekstensi"
	);
	$columns = implode(", ", $columns_arr);
	$stmt = $conn->prepare("INSERT INTO tb_pendaftaran(" . $columns . ") VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param(
		"sssssssssissssssssssssss",
		$generateId,
		$tanggal_daftar,
		$nama,
		$nisn,
		$tempat_lahir,
		$tanggal_lahir,
		$jenis_kelamin,
		$agama,
		$status_dalam_keluarga,
		$anak_ke,
		$alamat,
		$no_wa,
		$email,
		$nik,
		$no_kk,
		$tanggal_terbit_kk,
		$sekolah_asal,
		$npsn_sekolah_asal,
		$nama_ayah,
		$nama_ibu,
		$foto_base64,
		$foto_extension,
		$foto_kk_base64,
		$foto_kk_extension
	);

	if ($stmt->execute()) {
		echo '<script>window.location="berhasil.php?id=' . $generateId . '"</script>';
	} else {
		echo 'Error' . mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSB Online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<section class="box-formulir">
		<h2>Formulir Pendaftaran Siswa Baru</h2>
		<form action="" method="post" enctype="multipart/form-data">
			<h3> Data Diri Calon Siswa</h3>
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Nama Lengkap</td>
						<td>:</td>
						<td>
							<input type="text" name="nama" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>NISN (Nomor Induk Siswa Nasional)</td>
						<td>:</td>
						<td>
							<input type="text" name="nisn" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>
							<input type="text" name="tempat_lahir" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>
							<input type="date" name="tanggal_lahir" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
							<input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
						</td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>
							<select class="input-control" name="agama" required>
								<option value="">--Pilih Agama Anda--</option>
								<option value="Islam">Islam</option>
								<option value="Kristen Protestan">Kristen Protestan</option>
								<option value="Kristen Katolik">Kristen Katolik</option>
								<option value="Hindu">Hindu</option>
								<option value="Buddha">Buddha</option>
								<option value="Konghucu">Konghucu</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Status Dalam Keluarga</td>
						<td>:</td>
						<td>
							<select class="input-control" name="status_dalam_keluarga" required>
								<option value="">--Pilih Status dalam Keluarga--</option>
								<option value="Anak Kandung">Anak Kandung</option>
								<option value="Anak Angkat">Anak Angkat</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Anak Ke-</td>
						<td>:</td>
						<td>
							<select class="input-control" name="anak_ke" required>
								<option value="">--Pilih--</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Alamat Lengkap</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="alamat" required></textarea>
						</td>
					</tr>
					<tr>
						<td>Nomor WhatsApp (WA) Peserta Didik</td>
						<td>:</td>
						<td>
							<input type="text" name="no_wa" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Email Aktif</td>
						<td>:</td>
						<td>
							<input type="email" name="email" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>NIK (Nomor Induk Kependudukan) Siswa</td>
						<td>:</td>
						<td>
							<input type="text" name="nik" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Nomor Kartu Keluarga (KK)</td>
						<td>:</td>
						<td>
							<input type="text" name="no_kk" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Tanggal Terbit Kartu Keluarga (KK)</td>
						<td>:</td>
						<td>
							<input type="date" name="tanggal_terbit_kk" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Nama Sekolah Asal</td>
						<td>:</td>
						<td>
							<input type="text" name="sekolah_asal" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>NPSN Sekolah Asal</td>
						<td>:</td>
						<td>
							<input type="text" name="npsn_sekolah_asal" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Nama Ayah/Wali</td>
						<td>:</td>
						<td>
							<input type="text" name="nama_ayah" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Nama Ibu</td>
						<td>:</td>
						<td>
							<input type="text" name="nama_ibu" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Foto 3x4</td>
						<td>:</td>
						<td>
							<input class="input-control" type="file" name="foto" accept="image/*" required />
						</td>
					</tr>
					<tr>
						<td>Foto Kartu Keluarga</td>
						<td>:</td>
						<td>
							<input class="input-control" type="file" name="foto_kk" accept="image/*" required />
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="submit" class="btn-daftar" value="Daftar">
						</td>
					</tr>
				</table>
			</div>
		</form>
	</section>
</body>

</html>