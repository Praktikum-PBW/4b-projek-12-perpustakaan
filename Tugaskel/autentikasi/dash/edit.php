<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<body>
<input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>My Library</header>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-qrcode"></i> Dashboard</a></li>
            <li><a href="tampil.php"><i class="fas fa-qrcode"></i> Tampil Buku</a></li>
            <li><a href="tambah.php"><i class="fas fa-qrcode"></i> Tambah Buku</a></li>
            <li><a href="../logout.php"><i class="fas fa-qrcode"></i> Log Out</a></li>
        </ul>
    </div>
	<section> 
<?php include('../koneksi.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data Buku</font></center>

		<hr>

		<?php
		if(isset($_GET['id'])){

			$id = $_GET['id'];


			$select = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'") or die(mysqli_error($conn));

			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			}else{
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		if(isset($_POST['submit'])){
			$nama_buku			  = $_POST['nama_buku'];
			$nama_pembuat	= $_POST['nama_pembuat'];
			$genre	= $_POST['genre'];
			$sinopsis	= $_POST['sinopsis'];

			$sql = mysqli_query($conn, "UPDATE buku SET Nama_Mhs='$nama_buku', nama_pembuat='$nama_pembuat', genre='$genre', sinopsis='$sinopsis' WHERE id='$id'") or die(mysqli_error($conn));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="tampil.php";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		<form action="edit.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>
			<div class=" form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Buku</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_buku" class="form-control" value="<?php echo $data['nama_buku']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pembuat</label>
				<div class="col-md-6 col-sm-6 ">
                    <input type="text" name="nama_pembuat" class="form-control" value="<?php echo $data['nama_pembuat']; ?>" required>
					</div>
				</div>
			<div class="form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Genre</label>
				<div class="col-md-6 col-sm-6">
					<select name="genre" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="komedi" <?php if($data['genre'] == 'komedi'){ echo 'selected'; } ?>>Komedi</option>
						<option value="percintaan" <?php if($data['genre'] == 'percintaan'){ echo 'selected'; } ?>>percintaan</option>
						<option value="action" <?php if($data['genre'] == 'action'){ echo 'selected'; } ?>>action</option>
						<option value="drama" <?php if($data['genre'] == 'drama'){ echo 'selected'; } ?>>drama</option>
						<option value="isekai" <?php if($data['genre'] == 'isekai'){ echo 'selected'; } ?>>isekai</option>
						<option value="teknologi" <?php if($data['genre'] == 'teknologi'){ echo 'selected'; } ?>>teknologi</option>
					</select>
				</div>
			</div>
            <div class="form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sinopsis</label>
				<div class="col-md-6 col-sm-6 ">
                    <input type="text" name="sinopsis" class="form-control" value="<?php echo $data['sinopsis']; ?>" required>
					</div>
				</div>
			<div class="form-group">
				<div class="col-md-6 col-sm-6 offset-sm-2">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="tampil.php" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</div>
		</form>
	</section>
</body>
</html>
