<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <style>
        body {
            margin: 0 auto;
            width: 1000px;
        }

        header h1 {
            text-align: center;
            font-size: 60px;
        }

        header p {
            margin-top: -40px;
            text-align: center;
            font-size: 25px;
        }

        .body p {
            margin-top: -3px;
            text-align: center;
            font-size: 30px;
            text-decoration: underline;
        }

        .body table {
            width: 100%;
            border: 1px solid grey;
        }

        .body table th {
            border-right: 1px solid grey;
        }

        .body table td {
            text-align: center;
            border-right: 1px solid grey;
            border-top: 1px solid grey;
            padding: 3px 5px;
        }

        footer table {
            margin-top: 10px;
            float: right;
        }

        footer td {
            align-items: center;
            text-align: center;
        }

        footer p {
            align-items: center;
            text-align: center;
        }

        footer img {
            width: 10%;
        }
    </style>
</head>

<body onload="javascript:window.print()">

    <header>
        <h1>Perpustakaan</h1>
        <p>Universitas </p>
    </header>
    <hr>

    <div class="body">
        <p>Laporan Data Pengembalian Buku</p>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Buku</th>
                <th>Petugas</th>
                <th>Tanggal Kembali</th>
            </tr>
            <?php
            require_once '../database.php';
            $db = new database();
            $data = $db->cetakKembali($_POST['dari'], $_POST['sampai']);
            $no = 1;
            foreach ($data as $row) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_anggota']; ?></td>
                    <td><?= $row['judul_buku']; ?></td>
                    <td><?= $row['nama_petugas']; ?></td>
                    <td><?= $row['tgl_kembali']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <footer>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    Sragen, <?= date('d F Y'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Kepala Perpustakaan
                    <p>
                        <img src="img/ttd.jpeg" alt="ttd">
                    </p>
                    <u>Meilisa Mufaidah</u>
                </td>
            </tr>
        </table>
    </footer>


</body>

</html>