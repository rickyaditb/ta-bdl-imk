<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM barang");
$namaHalaman = "barang";
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- jquery dan dataTables-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css">
    <script type="text/javascript" src="js/datatables.min.js"></script>

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include_once("partial/sidenav.php"); ?>






    <div id="wrapper" class="wrapper">
        <div class="left-dummy">

        </div>
        <div class="right-content">
            <!--MAIN HEADER-->
            <?php include_once("partial/header.php");?>

            
            <!--MAIN CONTENT-->
            <div class="right-content-main2">
                <!--HEADER INDICATOR-->
                <div class="right-content-main-heading">
                    <div class="right-content-main-heading-container shadow">
                        <p class="right-content-main-heading-text">Daftar Barang</p>
                    </div>
                </div>
                <div class="right-content-main-barang-container shadow">
                    <button onclick="location.href='add_barang.php'" type="button" class="btn btn-primary right-content-main-barang-container-tambah">
                        <i class="material-icons right-content-main-barang-container-tambah-icon">add</i>
                        Tambah Data
                    </button>
                    <div class="right-content-main-barang-table-container">
                        <table id="tableku" class="table table-bordered right-content-main-barang-table">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Tanggal Masuk</th>
                                    <th class="center-tombol">Ruangan</th>
                                    <th class="center-tombol">Kondisi</th>
                                    <th class="center-tombol">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;

                                while ($user_data = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td> <?php echo $nomor++; ?> </td>
                                        <td> <?php echo $user_data['kode_barang']; ?> </td>
                                        <td> <?php echo $user_data['nama_barang']; ?> </td>
                                        <td>Rp <?php echo number_format($user_data['harga_barang'], 0, '', '.'); ?> </td>
                                        <td> <?php echo $user_data['tanggal_masuk']; ?> </td>
                                        <td class="center-tombol"><?php echo $user_data['kode_ruangan']; ?> </td>
                                        <td>
                                            <p class="badge bg-primary style-kondisi <?php echo $user_data['kondisi_barang']; ?> "><?php echo $user_data['kondisi_barang']; ?></p>
                                        </td>
                                        <td class="center-tombol">
                                            <a href="edit_barang.php?id=<?php echo $user_data['kode_barang']; ?>"><i class="badge bg-primary material-icons style-tombol tombol-edit">edit</i></a>
                                            <a href="delete_barang.php?id=<?php echo $user_data['kode_barang']; ?>"><i class="badge bg-primary material-icons style-tombol tombol-hapus">delete</i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--MAIN FOOTER-->
            <div class="right-content-footer">
                Footer
            </div>
        </div>
    </div>

    <script>
        /*Script untuk Table*/
        $(document).ready(function() {
            $('#tableku').DataTable({
                "lengthMenu": [ 10, 25, 50, 75, 100 ],
                "language": {
                    "url":"//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
                }
                
            });
        });
    </script>

    <?php include_once("partial/sidenav-script.php"); ?>

</body>

</html>