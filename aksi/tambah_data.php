<?php
$host     = "localhost";
$username = "root";
$password = "";
$dbname   = "itreq";

$link = mysqli_connect($host, $username, $password, $dbname) or die(mysqli_error());


$no = $_POST['no'];
$nama = $_POST['nama'];
$jenis_pekerjaan = $_POST['jenis_pekerjaan'];
$tanggal = $_POST['tanggal'];
$divisi = $_POST['divisi'];
$permintaan = $_POST['permintaan'];
$detail_permintaan = $_POST['detail_permintaan'];
$picit = $_POST['picit'];
$status = $_POST['status'];

if (isset($_POST['submit']))
{
$sql    = "INSERT INTO request SET no='$_POST[no]',nama='$_POST[nama]',jenis_pekerjaan='$_POST[jenis_pekerjaan]',tanggal='$_POST[tanggal]',divisi='$_POST[divisi]',permintaan='$_POST[permintaan]',detail_permintaan='$_POST[detail_permintaan]',picit='$_POST[picit]',status='$_POST[status]'";
$result = mysqli_query($link, $sql);

if (!$result) {
	echo "Gagal Insert ke database";
}
else
{
	header('Location:../index.php');
}
}
else
{
	header('Location:../index.php');
}

 ?>