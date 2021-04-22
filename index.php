<?php
                // Create database connection using config file
                include_once("koneksi.php");

                $query_barang_total = mysqli_query($mysqli, "SELECT * FROM barang");
                $query_barang_baik = mysqli_query($mysqli, "SELECT *  FROM barang WHERE kondisi_barang LIKE '%Baik%'");
                $query_barang_ringan = mysqli_query($mysqli, "SELECT *  FROM barang WHERE kondisi_barang LIKE '%Rusak Ringan%'");
                $query_barang_berat = mysqli_query($mysqli, "SELECT *  FROM barang WHERE kondisi_barang LIKE '%Rusak Berat%'");


                $jumlah_barang_total = mysqli_num_rows($query_barang_total);
                $jumlah_barang_baik = mysqli_num_rows($query_barang_baik);
                $jumlah_barang_ringan = mysqli_num_rows($query_barang_ringan);
                $jumlah_barang_berat = mysqli_num_rows($query_barang_berat);

                $tahun_0 = date("Y");
                $tahun_1 = date("Y")-1;
                $tahun_2 = date("Y")-2;
                $tahun_3 = date("Y")-3;
                $tahun_4 = date("Y")-4;
                $tahun_5 = date("Y")-5;
                $tahun_x = date("Y")-20;

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
    <title></title>
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

    <div class="sidenav shadow">
        <div class="sidenav-container">
            <center>
                <img src="img/logo2.png" class="logo"><br>
            </center>
            <ul class="sidenav-link">
                <li>
                    <a class="btn btn-primary sidenav-button" href="index.php"><i class="material-icons sidenav-icon">home</i>Beranda</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="barang.php"><i class="material-icons sidenav-icon">storage</i>Barang</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="ruangan.php"><i class="material-icons sidenav-icon">class</i>Ruangan</a>
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
            <div class="right-content-main">
                <!--HEADER INDICATOR-->
                <div class="right-content-main-heading">
                    <div class="right-content-main-heading-container shadow">
                        <p class="right-content-main-heading-text">Dashboard</p>
                    </div>
                </div>
                <!--MAIN STAT-->
                <div class="right-content-main-stat">
                    <div class="right-content-main-stat-container">
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
                    <div class="right-content-main-stat-container">
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
                    <div class="right-content-main-stat-container">
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
                    <div class="right-content-main-stat-container">
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
                <!--MAIN GRAPH-->
                <div class="right-content-main-graph">
                    <div class="right-content-main-graph-container">
                        <canvas id="chartsatu" class="shadow chartstyle"></canvas>
                    </div>
                    <div class="right-content-main-graph-container">
                        <canvas id="chartdua" class="shadow chartstyle"></canvas>
                    </div>
                </div>


                <div class="right-content-main-history">

                </div>
            </div>
            <!--MAIN FOOTER-->
            <div class="right-content-footer">
                Footer
            </div>
        </div>
    </div>

    <!--Script Untuk Setting ChartJs-->
    <script>
        let myChart = document.getElementById('chartsatu').getContext('2d');
        let bulan = new Chart(myChart, {
            type: 'bar',
            data: {
                labels: ['<?php echo $tahun_5."<";?>', '<?php echo $tahun_4;?>', '<?php echo $tahun_3;?>', '<?php echo $tahun_2;?>', '<?php echo $tahun_1;?>', '<?php echo $tahun_0;?>'],
                datasets: [{
                    label: 'Jumlah Barang',
                    data: [
                        <?php echo $jumlah_tahun_5_x;?>, <?php echo $jumlah_tahun_4;?>, <?php echo $jumlah_tahun_3;?>, <?php echo $jumlah_tahun_2;?>, <?php echo $jumlah_tahun_1;?>, <?php echo $jumlah_tahun_0;?>
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
                    y: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            },
        });




        let myChart2 = document.getElementById('chartdua').getContext('2d');
        let bulan2 = new Chart(myChart2, {
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








</body>

</html>