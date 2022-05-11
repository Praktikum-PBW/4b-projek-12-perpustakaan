<?php

include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
<div class="container" style="margin-top: 0px;">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <center><font size="6"> Data Buku</font></center>
    <hr>
    <a href="tambah.php"><button class="btn btn-dark right">Tambah Buku</button></a>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action" >
            <thead>
                <tr>
                    <th>no</th>
                    <th>id</th>
                    <th>Nama Buku</th>
                    <th>Nama Penulis</th>
                    <th>Genre</th>
                    <th>Sinopsis</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM buku ORDER BY id DESC") or die(mysqli_error($conn));

                if(mysqli_num_rows($sql) >0 ){
                    $no = 1;
                    while($data = mysqli_fetch_assoc($sql)){
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$data['id'].'</td>
                            <td>'.$data['nama_buku'].'</td>
                            <td>'.$data['nama_pembuat'].'</td>
                            <td>'.$data['genre'].'</td>
                            <td>'.$data['sinopsis'].'</td>
                            <td>
                            <a href="edit.php?id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="delete.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'yakin ingin menghapus data ini\')">Delete</a>
                            </td>
                        </tr>';
                        $no++;
                    }
                }else{
                    echo'
                    <tr>
                    <td colspan="6"> Tidak ada data. </td>
                    </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    </div>  
</div>
</section>
</body>
</html>