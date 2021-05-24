<?php
include_once("cek_sesi.php");
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM ruangan");
$namaHalaman = "ruangan";
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/sb-1.0.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/sb-1.0.1/datatables.min.js"></script>

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
                        <p class="right-content-main-heading-text">Daftar Ruangan</p>
                    </div>
                </div>
                <div class="right-content-main-barang-container shadow">
                    <button onclick="location.href='add_ruangan.php'" type="button" class="btn btn-primary right-content-main-barang-container-tambah">
                        <i class="material-icons right-content-main-barang-container-tambah-icon">add</i>
                        Tambah Ruangan
                    </button>
                    <div class="right-content-main-barang-table-container">
                        <table id="tableku" class="table table-bordered right-content-main-barang-table">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah Barang</th>
                                    <th>Jumlah Aset</th>
                                    <th class="center-tombol">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;

                                while ($user_data = mysqli_fetch_array($result)) {
                                    $singkat_kode = $user_data['kode_ruangan'];
                                    $jalankan_query_jumlah_barang = mysqli_query($mysqli, "SELECT * FROM ruangan INNER JOIN barang ON ruangan.kode_ruangan = barang.kode_ruangan WHERE barang.kode_ruangan LIKE '$singkat_kode'");
                                    $hitung_jumlah_barang = mysqli_num_rows($jalankan_query_jumlah_barang);

                                    $hitung_jumlah_asset = mysqli_query($mysqli, "SELECT SUM(harga_barang) FROM ruangan INNER JOIN barang ON ruangan.kode_ruangan = barang.kode_ruangan WHERE barang.kode_ruangan LIKE '$singkat_kode'");
                                    $simpan_hasil_ke_array = mysqli_fetch_row($hitung_jumlah_asset);
                                    $ambil_baris_pertama = $simpan_hasil_ke_array[0]; ?>

                                    <tr>
                                        <td> <?php echo $nomor++; ?></td>
                                        <td> <?php echo $user_data['kode_ruangan']; ?></td>
                                        <td> <?php echo $user_data['nama_ruangan']; ?></td>
                                        <td> <?php echo $hitung_jumlah_barang; ?></td>
                                        <td>Rp. <?php echo number_format($ambil_baris_pertama, 0, '', '.'); ?></td>
                                        <td class="center-tombol">
                                            <a href="edit_ruangan.php?id=<?php echo $user_data['kode_ruangan']; ?>"><i class="badge bg-primary material-icons style-tombol tombol-edit">edit</i></a>
                                            <a href="delete_ruangan.php?id=<?php echo $user_data['kode_ruangan']; ?>"><i class="badge bg-primary material-icons style-tombol tombol-hapus">delete</i></a>
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