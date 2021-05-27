<?php

include_once("cek_sesi.php");

// Create database connection using config file
include_once("koneksi.php");
$namaHalaman = "beranda";

$query_barang_total = mysqli_query($mysqli, "SELECT * FROM barang");
$query_barang_baik = mysqli_query($mysqli, "SELECT *  FROM barang WHERE kondisi_barang LIKE '%Baik%'");
$query_barang_ringan = mysqli_query($mysqli, "SELECT *  FROM barang WHERE kondisi_barang LIKE '%Rusak Ringan%'");
$query_barang_berat = mysqli_query($mysqli, "SELECT *  FROM barang WHERE kondisi_barang LIKE '%Rusak Berat%'");

$jumlah_barang_total = mysqli_num_rows($query_barang_total);
$jumlah_barang_baik = mysqli_num_rows($query_barang_baik);
$jumlah_barang_ringan = mysqli_num_rows($query_barang_ringan);
$jumlah_barang_berat = mysqli_num_rows($query_barang_berat);

$query_total_ruangan = mysqli_query($mysqli, "SELECT *  FROM ruangan");
$jumlah_total_ruangan = mysqli_num_rows($query_total_ruangan);

$query_total_aset = mysqli_query($mysqli, "SELECT SUM(harga_barang) FROM barang");
$simpan_hasil_ke_array = mysqli_fetch_row($query_total_aset);
$ambil_baris_pertama = $simpan_hasil_ke_array[0];

$tahun_0 = date("Y");
$tahun_1 = date("Y") - 1;
$tahun_2 = date("Y") - 2;
$tahun_3 = date("Y") - 3;
$tahun_4 = date("Y") - 4;
$tahun_5 = date("Y") - 5;
$tahun_x = date("Y") - 20;

$query_tahun_0 = mysqli_query($mysqli, "SELECT * FROM barang WHERE tanggal_masuk >='$tahun_0-01-01 00:00:00' AND tanggal_masuk <='$tahun_0-12-31 23:59:59';");
$query_tahun_1 = mysqli_query($mysqli, "SELECT * FROM barang WHERE tanggal_masuk >='$tahun_1-01-01 00:00:00' AND tanggal_masuk <='$tahun_1-12-31 23:59:59';");
$query_tahun_2 = mysqli_query($mysqli, "SELECT * FROM barang WHERE tanggal_masuk >='$tahun_2-01-01 00:00:00' AND tanggal_masuk <='$tahun_2-12-31 23:59:59';");
$query_tahun_3 = mysqli_query($mysqli, "SELECT * FROM barang WHERE tanggal_masuk >='$tahun_3-01-01 00:00:00' AND tanggal_masuk <='$tahun_3-12-31 23:59:59';");
$query_tahun_4 = mysqli_query($mysqli, "SELECT * FROM barang WHERE tanggal_masuk >='$tahun_4-01-01 00:00:00' AND tanggal_masuk <='$tahun_4-12-31 23:59:59';");
$query_tahun_5_x = mysqli_query($mysqli, "SELECT * FROM barang WHERE tanggal_masuk >='$tahun_x-01-01 00:00:00' AND tanggal_masuk <='$tahun_5-12-31 23:59:59';");

$jumlah_tahun_0 = mysqli_num_rows($query_tahun_0);
$jumlah_tahun_1 = mysqli_num_rows($query_tahun_1);
$jumlah_tahun_2 = mysqli_num_rows($query_tahun_2);
$jumlah_tahun_3 = mysqli_num_rows($query_tahun_3);
$jumlah_tahun_4 = mysqli_num_rows($query_tahun_4);
$jumlah_tahun_5_x = mysqli_num_rows($query_tahun_5_x);

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Beranda</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
            <?php include_once("partial/header.php"); ?>
            <!--MAIN CONTENT-->
            <div class="right-content-main">
                <!--HEADER INDICATOR-->
                <div class="right-content-main-heading">
                    <div class="right-content-main-heading-container shadow">
                        <p class="right-content-main-heading-text">Dashboard</p>
                    </div>
                </div>
                <!--MAIN STAT-->
                <div class="right-content-main-stat row">
                    <div class="first col row">
                        <div class="right-content-main-stat-container col-md">
                            <!--START PERTAMA-->
                            <div class="right-content-main-stat-wrapper shadow">
                                <div class="right-content-main-stat-1-icon-container">
                                    <i class="material-icons sidenav-icon right-content-main-stat-1-icon">storage</i>
                                </div>
                                <div class="right-content-main-stat-text">
                                    <p class="right-content-main-stat-text-title">Total Barang</p>
                                    <p class="right-content-main-stat-text-subtitle"><?php echo $jumlah_barang_total; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="right-content-main-stat-container col-md">
                            <!--START KEDUA-->
                            <div class="right-content-main-stat-wrapper shadow">
                                <div class="right-content-main-stat-2-icon-container">
                                    <i class="material-icons sidenav-icon right-content-main-stat-2-icon">check_circle</i>
                                </div>
                                <div class="right-content-main-stat-text">
                                    <p class="right-content-main-stat-text-title">Cukup Baik</p>
                                    <p class="right-content-main-stat-text-subtitle"><?php echo $jumlah_barang_baik; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="second col row">
                        <div class="right-content-main-stat-container col-md">
                            <!--START KETIGA-->
                            <div class="right-content-main-stat-wrapper shadow">
                                <div class="right-content-main-stat-3-icon-container">
                                    <i class="material-icons sidenav-icon right-content-main-stat-2-icon">error</i>
                                </div>
                                <div class="right-content-main-stat-text">
                                    <p class="right-content-main-stat-text-title">Rusak Ringan</p>
                                    <p class="right-content-main-stat-text-subtitle"><?php echo $jumlah_barang_ringan; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="right-content-main-stat-container col-md">
                            <!--START KEEMPAT-->
                            <div class="right-content-main-stat-wrapper shadow">
                                <div class="right-content-main-stat-4-icon-container">
                                    <i class="material-icons sidenav-icon right-content-main-stat-2-icon">remove_circle</i>
                                </div>
                                <div class="right-content-main-stat-text">
                                    <p class="right-content-main-stat-text-title">Rusak Berat</p>
                                    <p class="right-content-main-stat-text-subtitle"><?php echo $jumlah_barang_berat; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Second Row Stat-->
                <div class="right-content-main-graph row">
                    <div class="right-content-second-stat-container col-lg">
                        <div class="right-content-second-stat flex shadow">
                            <i class="material-icons sidenav-icon right-content-second-stat-icon Baik">attach_money</i>
                            <div class="right-content-second-stat-text">
                                <p class="right-content-second-stat-text-title">Total Aset</p>
                                <p>Rp <?php echo number_format($ambil_baris_pertama, 0, '', '.'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="right-content-second-stat-container col-lg">
                        <div class="right-content-second-stat flex shadow">
                            <i class="material-icons sidenav-icon right-content-second-stat-icon">school</i>
                            <div class="right-content-second-stat-text">
                                <p class="right-content-second-stat-text-title">Total Ruangan</p>
                                <p><?php echo $jumlah_total_ruangan; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--MAIN GRAPH-->

                <div class="right-content-main-graph row">
                    <div class="right-content-main-graph-container col-lg">
                        <canvas id="chartsatu" class="shadow chartstyle"></canvas>
                    </div>
                    <div class="right-content-main-graph-container col-lg">
                        <canvas id="chartdua" class="shadow chartstyle"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Script Untuk Setting ChartJs-->
    <script>
        let myChart = document.getElementById('chartsatu').getContext('2d');
        let tahun = new Chart(myChart, {
            type: 'bar',
            data: {
                labels: ['<?php echo $tahun_5 . "<"; ?>', '<?php echo $tahun_4; ?>', '<?php echo $tahun_3; ?>', '<?php echo $tahun_2; ?>', '<?php echo $tahun_1; ?>', '<?php echo $tahun_0; ?>'],
                datasets: [{
                    label: 'Jumlah Barang',
                    data: [
                        <?php echo $jumlah_tahun_5_x; ?>, <?php echo $jumlah_tahun_4; ?>, <?php echo $jumlah_tahun_3; ?>, <?php echo $jumlah_tahun_2; ?>, <?php echo $jumlah_tahun_1; ?>, <?php echo $jumlah_tahun_0; ?>
                    ],
                    backgroundColor: 'rgba(103, 119, 239, 0.7)',
                    borderWidth: 0,
                    borderColor: 'black',
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Tahun Penerimaan Barang',
                    fontSize: 25
                },
                legend: {
                    display: false,
                    position: 'right',
                    labels: {
                        fontColor: 'black'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            },
        });




        let myChart2 = document.getElementById('chartdua').getContext('2d');
        let kondisi = new Chart(myChart2, {
            type: 'pie',
            data: {
                labels: ['Berat', 'Ringan', 'Baik'],
                datasets: [{
                    label: 'Jumlah Barang',
                    data: [
                        <?php echo $jumlah_barang_berat; ?>, <?php echo $jumlah_barang_ringan; ?>, <?php echo $jumlah_barang_baik; ?>
                    ],
                    backgroundColor: ['rgba(218, 44, 56, 0.8)', 'rgba(250, 199, 72, 0.8)', 'rgba(88, 188, 130, 0.8)'],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Kondisi Barang',
                    fontSize: 25
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: 'black'
                    }
                }
            },
        });
    </script>






    <?php include_once("partial/sidenav-script.php"); ?>

</body>

</html>