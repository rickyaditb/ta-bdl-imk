<div id="sidenav" class="sidenav shadow">
    <div class="sidenav-container">
        <center>
            <img src="img/logo2.png" class="logo"><br>
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
                <a class="btn btn-primary sidenav-button-no" href="index.php">
                    <i class="material-icons sidenav-icon">group</i>
                    <p class="sidenav-text">Credit</p>
                </a>
            </li>
            <li>
                <a class="btn btn-primary sidenav-button-no" href="index.php">
                    <i class="material-icons sidenav-icon">settings</i>
                    <p class="sidenav-text">Setting</p>
                </a>
            </li>
            <li>
                <a class="btn btn-danger sidenav-button-no" href="index.php">
                    <i class="material-icons sidenav-icon">logout</i>
                    <p class="sidenav-text">Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>