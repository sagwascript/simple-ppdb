<?php

include 'koneksi.php';
if ($_SESSION['stat_login'] != true) {
	header("Location: login.php");
}
if (isset($_GET['id'])) {
	$delete = mysqli_query($conn, "DELETE FROM tb_pendaftaran WHERE id_pendaftaran = '" . $_GET['id'] . "' ");
	header("Location: data-peserta.php");
}
