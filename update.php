 <?php
include 'koneksi.php';

$no = $_POST['no'];

if (isset($_POST['submit']))
{
$sql    = "UPDATE request SET status='1' WHERE no='$no'";
// print_r($sql);

$result = mysqli_query($link, $sql);


if (!$result) {
	echo "Gagal Insert ke database";
}
else
{
	header('Location:index.php');
}
}
else
{
	header('Location:index.php');
}

 ?>