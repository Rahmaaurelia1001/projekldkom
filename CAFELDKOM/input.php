<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$ttl = $_POST['ttl'];
$jk = $_POST['jk'];
$asal = $_POST['asal'];
$alamat = $_POST['alamat'];




$ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
$image = $_FILES['image']['name'];
$x = explode('.', $image);
$ekstensi = strtolower(end($x));
$ukuran    = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 1044070) {
        move_uploaded_file($file_tmp, 'assets/' . $image);
        $query = mysqli_query($conn, "INSERT INTO mahasiswa value ('$nama','$nim','$ttl','$jk','$asal','$alamat','$image')");
        if ($query) {
            header("location:index.php?berhasil=yes");
        } else {
            header("location:index.php?berhasil=no");
        }
    } else {
        echo 'UKURAN FILE TERLALU BESAR';
        header("location:index.php?berhasil=no");
    }
} else {
    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    header("location:index.php?berhasil=no");
}
