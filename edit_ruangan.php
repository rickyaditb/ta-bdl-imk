<?php
include_once("cek_sesi.php");
ob_start(); // buffer flush
// Create database connection using config file
include_once("koneksi.php");
$namaHalaman = "ruangan";
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Ruangan</title>
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
			<?php include_once("partial/header.php");?>
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
                    if (isset($_POST['update'])) {
                        $kode = $_POST['kode_ruangan'];
                        $nama = $_POST['nama_ruangan'];

                        include_once("koneksi.php");

                        // kirim query ke database
                        $result = mysqli_query($mysqli, "UPDATE ruangan SET nama_ruangan='$nama' WHERE kode_ruangan='$kode'");

                        // tampilkan pesan jika data selesai ditambahkan
                        header("Location: ruangan.php");
                    }
                    ?>
                    <?php
                    // Display selected user data based on id
                    // Getting id from url
                    $id = $_GET['id'];


                    // Fetech user data based on id
                    $result = mysqli_query($mysqli, "SELECT * FROM ruangan WHERE kode_ruangan='$id'");

                    while ($user_data = mysqli_fetch_array($result)) {
                        $kode = $user_data['kode_ruangan'];
                        $nama = $user_data['nama_ruangan'];
                    }
                    ?>
                    <form action="edit_ruangan.php" method="post" name="form1">
                        <div class="form-group">
                            <label>Kode Ruangan</label>
                            <input class="form-control" placeholder="Masukan Kode Ruangan" name="kode_ruangan" value="<?php echo $kode; ?>" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Nama Ruangan</label>
                            <input class="form-control" placeholder="Masukan Nama Ruangan" name="nama_ruangan" value="<?php echo $nama; ?>" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary float-end left-form-button" name="update" value="Update"><b>Simpan</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("partial/sidenav-script.php"); ?>


</body>

</html>