<div id="sidenav" class="sidenav shadow">
    <div class="sidenav-container">
        <center>
            <img id="sidenav-logo" src="img/logo2.png" class="logo">
            <img id="sidenav-textx" class="sidenav-textx" src="img/logo2-minimized.png">
        </center>
        <ul class="sidenav-link">
            <li>
                <a class="btn btn-primary <?php if ($namaHalaman === "beranda") {
                                                echo "sidenav-button";
                                            } else {
                                                echo "sidenav-button-no";
                                            } ?>" href="index.php">
                    <i class="material-icons sidenav-icon">home</i>
                    <p class="sidenav-text">Beranda</p>
                </a>
            </li>
            <li>
                <a class="btn btn-primary <?php if ($namaHalaman === "barang") {
                                                echo "sidenav-button";
                                            } else {
                                                echo "sidenav-button-no";
                                            } ?>" href="barang.php">
                    <i class="material-icons sidenav-icon">storage</i>
                    <p class="sidenav-text">Barang</p>
                </a>
            </li>
            <li>
                <a class="btn btn-primary <?php if ($namaHalaman === "ruangan") {
                                                echo "sidenav-button";
                                            } else {
                                                echo "sidenav-button-no";
                                            } ?>" href="ruangan.php">
                    <i class="material-icons sidenav-icon">class</i>
                    <p class="sidenav-text">Ruangan</p>
                </a>
            </li>
            <li>
                <a class="btn btn-primary <?php if ($namaHalaman === "riwayat") {
                                                echo "sidenav-button";
                                            } else {
                                                echo "sidenav-button-no";
                                            } ?>" href="riwayat.php">
                    <i class="material-icons sidenav-icon">history</i>
                    <p class="sidenav-text">Riwayat</p>
                </a>
            </li>
            <li>
                <a class="btn btn-danger sidenav-button-no" href="logout.php">
                    <i class="material-icons sidenav-icon">logout</i>
                    <p class="sidenav-text">Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Untuk Mobile -->
<div class="topnav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="img/logo2.png" class="navbar-brand logo-mini">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="barang.php">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ruangan.php">Ruangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayat.php">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>