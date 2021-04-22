<?php
// Create database connection using config file
include_once("../koneksi.php");

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
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <div class="sidenav shadow">
        <div class="sidenav-container">
            <center>
                <img src="../img/logo2.png" class="logo"><br>
            </center>
            <ul class="sidenav-link">
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="../index.php"><i class="material-icons sidenav-icon">home</i>Beranda</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="../barang.php"><i class="material-icons sidenav-icon">storage</i>Barang</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button" href="../ruangan.php"><i class="material-icons sidenav-icon">class</i>Ruangan</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="../index.php"><i class="material-icons sidenav-icon">group</i>Credit</a>
                </li>
                <li>
                    <a class="btn btn-primary sidenav-button-no" href="../index.php"><i class="material-icons sidenav-icon">settings</i>Setting</a>
                </li>
                <li>
                    <a class="btn btn-danger sidenav-button-no" href="../index.php"><i class="material-icons sidenav-icon">logout</i>Logout</a>
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
                        <p class="right-content-main-heading-text">Tambah Ruangan</p>
                    </div>
                </div>
                <div class="right-content-main-barang-container shadow">
                    <?php
                    // cek apakah tombol 'Submit' ditekan
                    if (isset($_POST['Submit'])) {
                        $kode = $_POST['kode_ruangan'];
                        $nama = $_POST['nama_ruangan'];

                        include_once("../koneksi.php");

                        // kirim query ke database
                        $result = mysqli_query($mysqli, "INSERT INTO ruangan(kode_ruangan,nama_ruangan) VALUES('$kode','$nama')");

                        // tampilkan pesan jika data selesai ditambahkan
                        echo "<div class='alert alert-success'>Ruangan berhasil ditambahkan, <a role='alert' href='../ruangan.php'>Klik Disini</a> untuk kembali ke halaman Daftar Ruangan</div>";
                    }
                    ?>
                    <form action="add_ruangan.php" method="post" name="form1">
                        <div class="form-group">
                            <label>Kode Ruangan</label>
                            <input class="form-control" placeholder="Masukan Kode Ruangan" name="kode_ruangan" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Nama Ruangan</label>
                            <input class="form-control" placeholder="Masukan Nama Ruangan" name="nama_ruangan" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary float-end left-form-button" name="Submit" value="Add"><b>Tambah</b></button>
                    </form>
                </div>
            </div>
            <!--MAIN FOOTER-->
            <div class="right-content-footer">
                Footer
            </div>
        </div>
    </div>


</body>

</html>