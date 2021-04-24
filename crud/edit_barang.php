<?php
// Create database connection using config file
include_once("../koneksi.php");

$resultx = mysqli_query($mysqli, "SELECT * FROM ruangan");
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
					<a class="btn btn-primary sidenav-button" href="../barang.php"><i class="material-icons sidenav-icon">storage</i>Barang</a>
				</li>
				<li>
					<a class="btn btn-primary sidenav-button-no" href="../ruangan.php"><i class="material-icons sidenav-icon">class</i>Ruangan</a>
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
						<p class="right-content-main-heading-text">Tambah Barang</p>
					</div>
				</div>
				<div class="right-content-main-barang-container shadow">
					<?php
					// cek apakah tombol 'Submit' ditekan
					if (isset($_POST['update'])) {
						$kode = $_POST['kode_barang'];
						$nama = $_POST['nama_barang'];
						$harga = $_POST['harga_barang'];
						$kondisi = $_POST['kondisi_barang'];
						$ruangan = $_POST['kode_ruangan'];
						$tanggal = $_POST['tanggal_masuk'];



						include_once("../koneksi.php");

						// kirim query ke database
						$result = mysqli_query($mysqli, "UPDATE barang SET nama_barang='$nama',harga_barang='$harga',kondisi_barang='$kondisi',kode_ruangan='$ruangan',tanggal_masuk='$tanggal' WHERE kode_barang='$kode'");

						// tampilkan pesan jika data selesai ditambahkan
						header("Location: ../barang.php");
					}
					?>
					<?php
					// Display selected user data based on id
					// Getting id from url
					$id = $_GET['id'];
					

					// Fetech user data based on id
					$result = mysqli_query($mysqli, "SELECT * FROM barang WHERE kode_barang='$id'");

					while ($user_data = mysqli_fetch_array($result)) {
						$kode = $user_data['kode_barang'];
						$nama = $user_data['nama_barang'];
						$harga = $user_data['harga_barang'];
						$kondisi = $user_data['kondisi_barang'];
						$ruangan = $user_data['kode_ruangan'];
						$tanggal = $user_data['tanggal_masuk'];
					}
					?>
					<form action="edit_barang.php" method="post" name="form1">
						<div class="form-group">
							<label>Kode Barang</label>
							<input class="form-control"  name="kode_barang" value="<?php echo $kode ;?>" readonly>
						</div>
						<br>
						<div class="form-group">
							<label>Nama Barang</label>
							<input class="form-control" placeholder="Masukan Nama Barang" name="nama_barang" value="<?php echo $nama ;?>"required>
						</div>
						<br>
						<div class="form-group">
							<label>Harga Barang</label>
							<input type="number" class="form-control" placeholder="Masukan Harga Barang" name="harga_barang" value="<?php echo $harga ;?>" required>
						</div>
						<br>
						<div class="form-group">
							<label>Kondisi Barang</label>
							<select class="form-select" aria-label="Default select example" name="kondisi_barang" required>
								<option value="Baik" <?php if($kondisi === "Baik") {echo "selected";}?>>Baik</option>
								<option value="Rusak Ringan" <?php if($kondisi === "Rusak Ringan") {echo "selected";}?>>Rusak Ringan</option>
								<option value="Rusak Berat" <?php if($kondisi === "Rusak Berat") {echo "selected";}?>>Rusak Berat</option>
							</select>
						</div>
						<br>
						<div class="form-group">
							<label>Kode Ruangan</label>
							<select class="form-select" aria-label="Default select example" name="kode_ruangan" required>
								<option value="" disabled selected>Pilih Kode Ruangan</option>
								<?php
								while ($user_data = mysqli_fetch_array($resultx)) {
								?>
									<option value="<?php echo $user_data['kode_ruangan']; ?>"<?php if ($ruangan === $user_data['kode_ruangan']) {echo "selected";}?>><?php echo $user_data['kode_ruangan']; ?> (<?php echo $user_data['nama_ruangan']; ?>)</option>
								<?php
								}
								?>
							</select>
						</div>
						<br>
						<div class="form-group">
							<label>Tanggal Masuk</label>
							<input class="form-control" placeholder="Masukan Tanggal Masuk" name="tanggal_masuk" type="date" value="<?php echo $tanggal ;?>" required>
						</div>
						<br>
						<button type="submit" class="btn btn-primary float-end left-form-button" name="update" value="Update"><b>Simpan</b></button>
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