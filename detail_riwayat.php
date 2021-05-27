<?php
include_once("cek_sesi.php");
ob_start(); // buffer flush
// Create database connection using config file
include_once("koneksi.php");
$namaHalaman = "riwayat";

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail Riwayat</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


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
            <?php include_once("partial/header.php"); ?>
            <!--MAIN CONTENT-->
            <div class="right-content-main2">
                <!--HEADER INDICATOR-->
                <div class="right-content-main-heading">
                    <div class="right-content-main-heading-container shadow">
                        <p class="right-content-main-heading-text">Detail Riwayat</p>
                    </div>
                </div>
                <?php
                // Display selected user data based on id
                // Getting id from url
                $id = $_GET['id'];


                // Fetech user data based on id
                $result = mysqli_query($mysqli, "SELECT * FROM log WHERE id='$id'");

                while ($user_data = mysqli_fetch_array($result)) {
                    $id = $user_data['id'];
                    $tipe = $user_data['tipe'];
                    $kode = $user_data['kode'];
                    $aksi = $user_data['aksi'];
                    $waktu = $user_data['waktu'];
                    $nama_lama = $user_data['nama_lama'];
                    $nama_baru = $user_data['nama_baru'];
                    $harga_lama = $user_data['harga_lama'];
                    $harga_baru = $user_data['harga_baru'];
                    $kondisi_barang_lama = $user_data['kondisi_barang_lama'];
                    $kondisi_barang_baru = $user_data['kondisi_barang_baru'];
                    $tanggal_masuk_lama = $user_data['tgl_masuk_lama'];
                    $tanggal_masuk_baru = $user_data['tgl_masuk_baru'];
                    $ruangan_lama = $user_data['ruangan_lama'];
                    $ruangan_baru = $user_data['ruangan_baru'];
                }
                ?>
                <div class="row">
                    <?php if ($tipe == "Barang") {
                        echo '
                        <div class="right-content-main-graph row">
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">inventory</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Tipe</p>
                                        <p>' . $tipe . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">description</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Aksi</p>
                                        <p>' . $aksi . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">code</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Kode Ruangan</p>
                                        <p>' . $kode . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">schedule</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Waktu</p>
                                        <p>' . $waktu . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">contacts</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Nama Lama</p>
                                        <p>' . $nama_lama . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">contacts</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Nama Baru</p>
                                        <p>' . $nama_baru . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">attach_money</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Harga Lama</p>
                                        <p>' . $harga_lama . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">attach_money</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Harga Baru</p>
                                        <p>' . $harga_baru . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">inventory</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Kondisi Lama</p>
                                        <p>' . $kondisi_barang_lama . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">inventory</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Kondisi Baru</p>
                                        <p>' . $kondisi_barang_baru . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">class</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Ruangan Lama</p>
                                        <p>' . $ruangan_lama . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">class</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Ruangan Baru</p>
                                        <p>' . $ruangan_baru . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">event</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Tanggal Masuk Lama</p>
                                        <p>' . $tanggal_masuk_lama . '</p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-content-second-stat-container col-lg-6">
                                <div class="right-content-second-stat flex shadow">
                                    <i class="material-icons sidenav-icon right-content-second-stat-icon">event</i>
                                    <div class="right-content-second-stat-text">
                                        <p class="right-content-second-stat-text-title">Tanggal Masuk Baru</p>
                                        <p>' . $tanggal_masuk_baru . '</p>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    } else {
                        echo '
                    <div class="right-content-main-graph row">
                        <div class="right-content-second-stat-container col-lg-6">
                            <div class="right-content-second-stat flex shadow">
                                <i class="material-icons sidenav-icon right-content-second-stat-icon">inventory</i>
                                <div class="right-content-second-stat-text">
                                    <p class="right-content-second-stat-text-title">Tipe</p>
                                    <p>' . $tipe . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="right-content-second-stat-container col-lg-6">
                            <div class="right-content-second-stat flex shadow">
                                <i class="material-icons sidenav-icon right-content-second-stat-icon">description</i>
                                <div class="right-content-second-stat-text">
                                    <p class="right-content-second-stat-text-title">Aksi</p>
                                    <p>' . $aksi . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="right-content-second-stat-container col-lg-6">
                            <div class="right-content-second-stat flex shadow">
                                <i class="material-icons sidenav-icon right-content-second-stat-icon">code</i>
                                <div class="right-content-second-stat-text">
                                    <p class="right-content-second-stat-text-title">Kode Ruangan</p>
                                    <p>' . $kode . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="right-content-second-stat-container col-lg-6">
                            <div class="right-content-second-stat flex shadow">
                                <i class="material-icons sidenav-icon right-content-second-stat-icon">schedule</i>
                                <div class="right-content-second-stat-text">
                                    <p class="right-content-second-stat-text-title">Waktu</p>
                                    <p>' . $waktu . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="right-content-second-stat-container col-lg-6">
                            <div class="right-content-second-stat flex shadow">
                                <i class="material-icons sidenav-icon right-content-second-stat-icon">contacts</i>
                                <div class="right-content-second-stat-text">
                                    <p class="right-content-second-stat-text-title">Nama Lama</p>
                                    <p>' . $nama_lama . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="right-content-second-stat-container col-lg-6">
                            <div class="right-content-second-stat flex shadow">
                                <i class="material-icons sidenav-icon right-content-second-stat-icon">contacts</i>
                                <div class="right-content-second-stat-text">
                                    <p class="right-content-second-stat-text-title">Nama Baru</p>
                                    <p>' . $nama_baru . '</p>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }

                    ?>

                </div>










            </div>
        </div>
    </div>
    <?php include_once("partial/sidenav-script.php"); ?>


</body>

</html>