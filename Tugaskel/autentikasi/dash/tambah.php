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

		<center><font size="6">Tambah Buku</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id			= $_POST['id'];
			$nama_buku			= $_POST['nama_buku'];
			$nama_pembuat	= $_POST['nama_pembuat'];
			$genre = $_POST['genre'];
			$sinopsis		= $_POST['sinopsis'];

			$cek = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'") or die(mysqli_error($conn));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($conn, "INSERT INTO buku(id, nama_buku, nama_pembuat,genre, sinopsis) VALUES('$id', '$nama_buku', '$nama_pembuat','$genre', '$sinopsis')") or die(mysqli_error($conn));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tampil.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>
    
    <form action="tambah.php" method="post">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id" class="form-control" size="4" placeholder="masukkan id" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Buku</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_buku" class="form-control" placeholder="masukkan nama buku" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pembuat</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
                    <input type="text" name="nama_pembuat" class="form-control" placeholder="masukkan nama pembuat" required>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Genre</label>
				<div class="col-md-6 col-sm-6">
					<select name="genre" class="form-control" required>
						<option value="">Pilih genre</option>
						<option value="komedi">Komedi</option>
						<option value="percintaan">Percintaan</option>
						<option value="action">Action</option>
						<option value="drama">Drama</option>
						<option value="isekai">Isekai</option>
						<option value="teknologi">Teknologi</option>
					</select>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sinopsis</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<textarea name="sinopsis"  cols="30" rows="3" required></textarea>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
	</section>
</body>
</html>