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
    <div class="container-fluid banner">
     <div class="container text-center">
      <h4 class="display-6">Selamat Datang</h4>
      <h3 class="display-2">Di Halaman admin</h3>
      <a href="tampil.php">
        <button type="button" class="btn btn-danger btn-lg mt-3">Melihat Buku</button>
      </a>
      <a href="tambah.php">
        <button type="button" class="btn btn-danger btn-lg mt-3">Tambah Buku</button>
      </a>
     </div>
    </div>
    </section>
</body>
</html>