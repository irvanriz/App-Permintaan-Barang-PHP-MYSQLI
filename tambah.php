<?php
    include 'koneksi.php';
 
    // mengambil data barang dengan kode paling besar
    $sql = "SELECT max(no) as kodeTerbesar FROM request";
    $query = mysqli_query($link, $sql);
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];
 
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeBarang, 3, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "ITR";
    $kodeBarang = $huruf . sprintf("%03s", $urutan);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form IT Request</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Form IT Request
    </div>
    <div class="form">
        <form method="POST" action="aksi/tambah_data.php">
            <div class="inputfield">
                <label>No</label>
                <input type="text" class="input" name="no" value="<?php echo $kodeBarang ?>" readonly>
            </div>
            <div class="inputfield">
                <label>Nama Pemohon</label>
                <input type="text" class="input" name="nama">
            </div>
            <div class="inputfield">
                <label>Jenis Pekerjaan</label>
                <div class="custom_select">
                    <select name="jenis_pekerjaan">
                        <option value="baru">-- Pilih Jenis Pekerjaan --</option>
                        <option value="baru">Baru</option>
                        <option value="modifikasi">Modifikasi</option>
                        <option value="perbaikan">Perbaikan</option>
                    </select>
                </div>
            </div> 
            <div class="inputfield">
                <label>Tanggal</label>
                <input type="date" class="input" name="tanggal">
            </div>  
            <div class="inputfield">
                <label>Divisi / Bagian</label>
                <input type="text" class="input" name="divisi">
            </div>
            <div class="inputfield">
                <label>Permintaan</label>
                <input type="text" class="input" name="permintaan">
            </div>  
            <div class="inputfield">
                <label>Detail Permintaan</label>
                <textarea class="textarea" name="detail_permintaan"></textarea>
            </div> 
            <div class="inputfield">
                <label>PIC IT</label>
                <input type="text" class="input" name="picit">
            </div>
            <div class="inputfield">
                <input type="hidden" class="input" name="status" value="0">
            </div>
            <div class="inputfield">
                <input type="submit" name="submit" value="Simpan" class="btn"><br><br>
            </div>
            <a href="index.php"><img src="gambar/back.png" width="50px" height="50px"></a>
        </form>
    </div>
</div>	
	
</body>
</html>