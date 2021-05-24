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
    <title></title>
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
                <div class="right-content-main-barang-container shadow">
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
                            <form class="col">
                            <div class="form-group">
                                <label>Tipe</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$tipe.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$kode.'" readonly>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Nama Lama</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$nama_lama.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Harga Lama</label>
                                <input class="form-control" placeholder="Data Kosong" name="nama_ruangan" value="'.$harga_lama.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Kondisi Barang Lama</label>
                                <input class="form-control" placeholder="Data Kosong" name="nama_ruangan" value="'.$kondisi_barang_lama.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Ruangan Lama</label>
                                <input class="form-control" placeholder="Data Kosong" name="nama_ruangan" value="'.$ruangan_lama.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Tanggal Masuk Lama</label>
                                <input class="form-control" placeholder="Data Kosong" name="nama_ruangan" value="'.$tanggal_masuk_lama.'" readonly>
                            </div>
                        </form>
                        <form action="edit_ruangan.php" method="post" name="form1" class="col">
                            <div class="form-group">
                                <label>Aksi</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$aksi.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Waktu</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$waktu.'" readonly>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Nama Baru</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$nama_baru.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Harga Baru</label>
                                <input class="form-control" placeholder="Data Kosong" name="nama_ruangan" value="'.$harga_baru.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Kondisi Barang Baru</label>
                                <input class="form-control" placeholder="Data Kosong" name="nama_ruangan" value="'.$kondisi_barang_baru.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Ruangan Baru</label>
                                <input class="form-control" placeholder="Data Kosong" name="nama_ruangan" value="'.$ruangan_baru.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Tanggal Masuk Baru</label>
                                <input class="form-control" placeholder="Data Kosong" name="nama_ruangan" value="'.$tanggal_masuk_baru.'" readonly>
                            </div>
                        </form>';
                        } 
                        else {
                            echo '
                            <form class="col">
                            <div class="form-group">
                                <label>Tipe</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$tipe.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$kode.'" readonly>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Nama Lama</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$nama_lama.'" readonly>
                            </div>
                        </form>
                        <form action="edit_ruangan.php" method="post" name="form1" class="col">
                            <div class="form-group">
                                <label>Aksi</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$aksi.'" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Waktu</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$waktu.'" readonly>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Nama Baru</label>
                                <input class="form-control" placeholder="Data Kosong" name="kode_ruangan" value="'.$nama_baru.'" readonly>
                            </div>
                        </form>';
                        }

                        ?>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <?php include_once("partial/sidenav-script.php"); ?>


</body>

</html>