<!-- NAMESPACE-->
<?php
require_once '../database.php';
class menu
{
    function __construct()
    {
        require_once "menu.php";
    }
}
$menu = new menu;
$db = new database;
$data = $db->dataAnggota();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">

        <!-- cotent -->
        <div class="main-content container-fluid">
            <div class="col-md-12">
                <?php if (isset($_SESSION['flash'])) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data<strong><?= $_SESSION['flash']['pesan']; ?></strong><?= $_SESSION['flash']['aksi']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['flash']); ?>
                <?php endif; ?>
            </div>
            <h1 class="mb-4">
                <i class="fa-solid fa-fw fa-users"></i>
                Anggota
            </h1>
            <div class="row" id="table-hover">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-1">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahAnggota">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-11">
                                        <form action="" method="post">
                                            <div class="input-group">
                                                <input type="text" name="cari" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                <button class="btn btn-outline-primary btn-sm" type="submit" id="button-addon2">Cari</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- table hover -->
                            <div class="table-responsive">
                                <table border="1" class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Prodi</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data as $row) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['nim_anggota']; ?></td>
                                                <td><?= $row['nama_anggota']; ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td>
                                                    <a href="<?= "detailAnggota.php?&&id=$row[id_anggota]"; ?>" class="badge bg-success"><i class="fa-solid fa-fw fa-circle-info"></i></a>
                                                    <a href="<?= "formUbah.php?aksi=anggota&&id=$row[id_anggota]"; ?>" class="badge bg-primary"><i class="fa-solid fa-fw fa-pencil"></i></a>
                                                    <a href="<?= "prosesAnggota.php?&&aksi=hapus&&id=$row[id_anggota]"; ?>" class="badge bg-danger" onclick="javascript: return confirm('Apakah anda yakin ingin dihapus?')"><i class="fa-solid fa-fw fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->

        <?php require_once 'formTambah.php'; ?>

    </div>
    <script src="../assets/js/feather-icons/feather.min.js"></script>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>