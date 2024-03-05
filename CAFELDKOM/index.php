<?php
session_start();
include 'koneksi.php';
$berhasil = isset($_GET['berhasil']);
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>
</head>

<body>
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <h2>Rental Mobil Aurel</h2>
        <hr>
      </div>
    </div>
    <div class="row text-end">
      <div class="col">
        <a class="btn btn-primary" type="button" href="halamaninput.php"> Rental</a>
        <a href="logout.php" class="btn btn-primary" type="button"> Logout</a>
      </div>
    </div><br>
    <div class="row">
      <div class="col">
        <?php if ($berhasil == 'yes') { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Submit Berhasil !</strong> Data sudah masuk ke database.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } else if ($berhasil == 'no') { ?>
          <div class="alert alert-warnig alert-dismissible fade show" role="alert">
            <strong>Submit Gagal !</strong> Data tidak dapat disimpan di database.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIk</th>
              <th scope="col">Tanggal Pemesanan</th>
              <th scope="col">Jenis Kendaraan</th>
              <th scope="col">Tanggal Kembali</th>
              <th scope="col">Alamat</th>
              <th scope="col">Foto</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $ambil = mysqli_query($conn, "SELECT * FROM mahasiswa");
            while ($pecah = mysqli_fetch_assoc($ambil)) {
            ?>
              <tr>
                <th><?php echo $i++; ?></th>
                <td><?php echo $pecah['nama']; ?></td>
                <td><?php echo $pecah['nim']; ?></td>
                <td><?php echo $pecah['ttl']; ?></td>
                <td><?php $jk = $pecah['jk'];
                    if ($jk == 1) {
                      echo "Perempuan";
                    } else {
                      echo "Laki-laki";
                    }
                    ?>
                </td>
                <td><?php echo $pecah['asal']; ?></td>
                <td><?php echo $pecah['alamat']; ?></td>
                <td><img src="assets/<?php echo $pecah['image']; ?>" alt="" style="width:100px;height: 100px;"></td>
                <td>
                  <a href="halamanedit.php?id=<?php echo $pecah['nim']; ?>"><span class="badge  bg-warning text-dark">Edit</span></a>
                  <a href="hapus.php?id=<?php echo $pecah['nim']; ?>"><span class="badge  bg-danger text-dark">Delete</span></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>