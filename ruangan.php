<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM ruangan");


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

    <div class="sidenav shadow">
        <div class="sidenav-container">
            <center>
                <img src="img/logo2.png" class="logo"><br>
            </center>
            <ul class="sidenav-link">
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="index.php"><i class="material-icons sidenav-icon">home</i>Beranda</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="barang.php"><i class="material-icons sidenav-icon">storage</i>Barang</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button" href="ruangan.php"><i class="material-icons sidenav-icon">class</i>Ruangan</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="index.php"><i class="material-icons sidenav-icon">group</i>Credit</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="index.php"><i class="material-icons sidenav-icon">settings</i>Setting</a>
                </li>
                <li>
                    <a class="btn btn-danger sidenav-button-no" href="index.php"><i class="material-icons sidenav-icon">logout</i>Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="wrapper">
        <div class="left-dummy">

        </div>
        <div class="right-content">
            <!--MAIN HEADER-->
            <div class="right-content-header">
                <div class="right-content-header-profile">
                    <!--the icon is only a placeholder atm-->
                    <div class="right-content-header-profile-left">
                        <i class="material-icons right-content-header-toggle-icon">menu</i>
                    </div>
                    <div class="right-content-header-profile-right">
                        <i class="material-icons right-content-header-profile-icon">account_circle</i>
                        <p class="right-content-header-profile-text">Halo, Administrator</p>
                        <i class="material-icons right-content-header-profile-icon-dropdown">arrow_drop_down</i>
                    </div>
                </div>

            </div>
            <!--MAIN CONTENT-->
            <div class="right-content-main2">
                <!--HEADER INDICATOR-->
                <div class="right-content-main-heading">
                    <div class="right-content-main-heading-container shadow">
                        <p class="right-content-main-heading-text">Daftar Ruangan</p>
                    </div>
                </div>
                <div class="right-content-main-barang-container shadow">
                    <button onclick="location.href='crud/add_ruangan.php'" type="button" class="btn btn-primary right-content-main-barang-container-tambah">
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

                                    $hitung_jumlah_asset = mysqli_query($mysqli,"SELECT SUM(harga_barang) FROM ruangan INNER JOIN barang ON ruangan.kode_ruangan = barang.kode_ruangan WHERE barang.kode_ruangan LIKE '$singkat_kode'");
                                    $simpan_hasil_ke_array = mysqli_fetch_row($hitung_jumlah_asset);
                                    $ambil_baris_pertama = $simpan_hasil_ke_array[0]; ?>

                                    <tr>
                                    <td> <?php echo $nomor++;?></td>
                                    <td> <?php echo $user_data['kode_ruangan'];?></td>
                                    <td> <?php echo $user_data['nama_ruangan'];?></td>
                                    <td> <?php echo $hitung_jumlah_barang;?></td>
                                    <td>Rp. <?php echo number_format($ambil_baris_pertama, 0, '', '.');?></td>
                                    <td class="center-tombol">
                                        <a href="crud/edit_ruangan.php?id=<?php echo $user_data['kode_ruangan'];?>"><i class="badge bg-primary material-icons style-tombol tombol-edit">edit</i></a>
                                        <a href="crud/delete_ruangan.php?id=<?php echo $user_data['kode_ruangan'];?>"><i class="badge bg-primary material-icons style-tombol tombol-hapus">delete</i></a>
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
                "language": {
                    "lengthMenu": "Menampilkan _MENU_ Entri",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "",
                    /*
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    */
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                    "search": "Cari :"
                }
            });
        });
    </script>

</body>

</html>