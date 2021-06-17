<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<title>List Data IT Request</title>
	<link rel="stylesheet" href="styles.css">
    <style type="text/css">
        /* Table */
        body {
            font-family: "lucida Sans Unicode", "Lucida Grande", "Segoe UI", vardana
        }
        .demo-table {
            border-collapse: collapse;
            font-size: 13px;
        }
        .demo-table th, 
        .demo-table td {
            padding: 7px 17px;
        }
        .demo-table .title {
            caption-side: bottom;
            margin-top: 12px;
        }
        .demo-table thead th:last-child,
        .demo-table tfoot th:last-child,
        .demo-table tbody td:last-child {
            border: 0;
        }

        /* Table Header */
        .demo-table thead th {
            background-color: #fec107;
            color: #FFFFFF;
            border-color: #6ea1cc !important;
            text-transform: uppercase;
        }

        /* Table Body */
        .demo-table tbody td {
            color: #353535;
            border-right: 1px solid #c7ecc7;
        }
        .demo-table tbody tr:nth-child(odd) td {
            background-color: #f4fff7;
        }
        .demo-table tbody tr:nth-child(even) td {
            background-color: #dbffe5;
        }
        .demo-table tbody td:nth-child(4),
        .demo-table tbody td:first-child,
        .demo-table tbody td:last-child {
            text-align: right;
        }
        .demo-table tbody tr:hover td {
            background-color: #ffffa2;
            border-color: #ffff0f;
            transition: all .2s;
        }

        /* Table Footer */
        .demo-table tfoot th {
            border-right: 1px solid #c7ecc7;
        }
        .demo-table tfoot th:first-child {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="title">
      List Data IT Request
    </div>
    <div class="form">
        <a href="#">
            <img src="gambar/home.jpg" width="50px" height="50px">
        </a>
        &nbsp;
        <a href="tambah.php">
            <img src="gambar/add.png" width="50px" height="50px">
        </a>
        
        <br>
        <br>
       <table class="demo-table" id="myTable">
        <caption class="title"></caption>
        <thead>
            <tr>
                <th>No</th>
                <th>No IT Request</th>
                <th>Nama Pemohon</th>
                <th>Jenis Pekerjaan</th>
                <th>Tanggal</th>
                <th>Divisi</th>
                <th>Permintaan</th>
                <th>Detail Permintaan</th>
                <th>PIC IT</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'koneksi.php';
            $halaman = 25;
            $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

            $sql1 = "SELECT * FROM request group by id desc";
            $result = mysqli_query($link, $sql1);
            $total = mysqli_num_rows($result);

            $pages = ceil($total/$halaman);       

            $sql2 = "select * from request group by id desc LIMIT $mulai, $halaman";
            $query = mysqli_query($link, $sql2);
            $no =$mulai+1;


            while ($mas = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $mas['no'] ?></td>
                <td><?php echo $mas['nama'] ?></td>
                <td><?php echo $mas['jenis_pekerjaan'] ?></td>
                <td><?php echo $mas['tanggal'] ?></td>
                <td><?php echo $mas['divisi'] ?></td>
                <td><?php echo $mas['permintaan'] ?></td>
                <td><?php echo $mas['detail_permintaan'] ?></td>
                <td><?php echo $mas['picit'] ?></td>
                <td>
                    <?php
                    if($mas['status'] == "1") {
                        echo "";
                    } else {?>
                        <form action="update.php" method="POST">
                        <input type="hidden" name="no" value="<?php echo $mas['no'] ?>">
                        <button type="submit" name="submit">
                            <img src="gambar/ceklist.png" width="20px" height="20px" name="submit">
                        </button>
                        </form>
                    <?php
                        }
                    ?>
                </td>
            </tr>
            <?php               
              } 
            ?>
        </tbody>
    </table>
    </div>
</div>	

</script>
</script>
</body>
</html>