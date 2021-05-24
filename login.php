<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrapper-login">
        <div class="left-form">
            <img class="left-form-logo" src="img/logo2.png">
            <h5 class="left-form-subtitle">Aplikasi <b>Inventaris Barang Sekolah</b></h5>
            <?php
            session_start();
            include_once("koneksi.php");

            if(isset($_SESSION["login"])) {
                header("Location: index.php");
            }

            // Proses Login
            if (isset($_POST['login'])) {
                $user    = $_POST['username'];
                $pass    = $_POST['password'];

                $query = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$user'");
                if (mysqli_num_rows($query) != 0) {
                    $row = mysqli_fetch_assoc($query);
                    $db_user = $row['username'];
                    $db_pass = $row['password'];

                    if ($user == $db_user && $pass == $db_pass) {
                        $_SESSION["login"] = true;
                        $_SESSION["user"] = $user;
                        header("Location: index.php");
                    } else {
                        echo '<div class="alert alert-danger left-form-alert" role="alert">Password yang anda masukan salah!</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger left-form-alert" role="alert">Username belum terdaftar!</div>';
                }
            }
            // Proses Register
            if (isset($_POST['register'])) {
                $user    = $_POST['username'];
                $pass    = $_POST['password'];

                $cek_duplikat = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$user'");
                if (mysqli_num_rows($cek_duplikat) >= 1) {
                    echo '<div class="alert alert-danger left-form-alert" role="alert">Gagal, Username sudah terdaftar</div>';
                } else {
                    $result = mysqli_query($mysqli, "INSERT INTO user(username,password) VALUES('$user','$pass')");
                    echo '<div class="alert alert-success left-form-alert" role="alert">Akun berhasil didaftarkan, silahkan masuk</div>';
                }
            }
            ?>
            <form class="left-form-login" action="login.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" placeholder="Masukan Password" name="password" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary float-end left-form-button-login" name="login"><b>Masuk</b></button>
                <button type="submit" class="btn btn-primary float-end left-form-button-register" name="register"><b>Daftar</b></button>
            </form>
        </div>
        <div class="right-image">
            <p class="right-image-title" id="jam"></p>
            <p class="right-image-subtitle">Bogor, Indonesia</p>
            <!--<p class="right-image-credit">Art by Arseniy Chebynkin on Pixiv</p>-->
        </div>
    </div>


    <script>
        var today = new Date()
        var jam = today.getHours()

        if (jam >= 0 && jam < 4) {
            document.getElementById("jam").innerHTML = 'Selamat Malam!';
        } else if (jam >= 4 && jam < 10) {
            document.getElementById("jam").innerHTML = 'Selamat Pagi!';
        } else if (jam >= 10 && jam < 15) {
            document.getElementById("jam").innerHTML = 'Selamat Siang!';
        } else if (jam >= 15 && jam < 19) {
            document.getElementById("jam").innerHTML = 'Selamat Sore!';
        } else {
            document.getElementById("jam").innerHTML = 'Selamat Malam!';
        }
    </script>


</body>

</html>