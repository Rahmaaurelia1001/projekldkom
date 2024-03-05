<?php
include 'koneksi.php';
$nim = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$pecah = mysqli_fetch_assoc($query);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Page</title>
</head>

<body>
    <!-- <h1>Hello, worldnlkfw!</h1> -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <section id="form">
        <div class="container ">
            <div class="row text-center">
                <div class="col">
                    <h2>Edit Form Pendaftaran</h2>
                    <hr>
                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-md-6 bg-light">
                    <div class="container mt-4 mb-4">



                        <form action="edit.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $pecah['nama']; ?>" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" readonly name="nim" id="nim" value="<?php echo $pecah['nim']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
                                <input type="date" class="form-control" name="ttl" value="<?php echo $pecah['ttl']; ?>" id="ttl">
                            </div>
                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jk" aria-label="Default select example">
                                    <?php
                                    if ($pecah['jk'] == 1) {
                                        $jk = "Perempuan";
                                    } else {
                                        $jk = "Laki-laki";
                                    }
                                    ?>
                                    <option disabled selected value="<?php echo $pecah["nim"] ?>"><?= $jk ?></option>
                                    <option value="1">Perempuan</option>
                                    <option value="2">Laki-Laki</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="asal" class="form-label">Kota Asal</label>
                                <input type="text" class="form-control" name="asal" value="<?php echo $pecah['asal']; ?>" id="asal">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $pecah['alamat']; ?>">
                            </div>
                            <div class="mb-3">
                                <img src="assets/<?php echo $pecah['image']; ?>" alt="" style="width:100px;height: 100px;">
                                <td></td>
                                <label for="alamat" class="form-label"></label>
                                <input type="file" class="form-control" name="image" id="gambar">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a href="index.php" class="btn btn-success">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

</html>