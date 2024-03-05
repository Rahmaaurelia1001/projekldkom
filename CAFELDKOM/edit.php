<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $ttl = $_POST['ttl'];
    $jk = $_POST['jk'];
    $asal = $_POST['asal'];
    $alamat = $_POST['alamat'];

    $allowExt             = array('png', 'jpg', 'jpeg');
    $fileName             = $_FILES['image']['name'];
    $fileExt            = strtolower(end(explode('.', $fileName)));
    $fileSize            = $_FILES['image']['size'];
    $fileTemp             = $_FILES['image']['tmp_name'];
    $base                 = basename($fileName);
    $image             = str_replace(' ', '_', $base);


    if ($_FILES['image']['size'] > 0) {
        if (in_array($fileExt, $allowExt) === true) {
            if ($fileSize < 1044070) //untuk mengecek ukuran file
            {
                if (move_uploaded_file($fileTemp, 'assets/' . $image)) {
                    $query = mysqli_query($conn, "UPDATE mahasiswa SET 
                            nama = '$nama',
			                nim = '$nim',
			                ttl = '$ttl',
			                jk = '$jk',
			                asal = '$asal',
			                alamat = '$alamat',
                            image = '$image' 
			                WHERE nim = '$nim'");
                    if ($query) {
                        header("location:index.php?berhasil=yes");
                    } else {
                        header("location:index.php?berhasil=no");
                    }
                } else {
                    echo 'FILE TIDAK TERUPDATE';
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
    } else {
        $query = mysqli_query($conn, "UPDATE mahasiswa SET 
            nama = '$nama',
            nik = '$nik',
            tanggalpemesanan = '$tanggalpemesanan',
            nokendaraan = '$nokendaraan',
            tanggalkembali = '$tanggalkembali',
            alamat = '$alamat' 
            WHERE nik = '$nik'");

        if ($query) {
            header("location:index.php?berhasil=yes");
        } else {
            header("location:index.php?berhasil=no");
        }
    }
}
// 	

// 
