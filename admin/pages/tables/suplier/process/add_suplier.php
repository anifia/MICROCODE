<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id       = $_POST['id'];
    $nama     = $_POST['nama'];
    $kota     = $_POST['kota'];
    $alamat   = $_POST['alamat'];
    $kontak   = $_POST['kontak'];
    $telpon   = $_POST['telpon'];

    $query = "INSERT INTO suplier VALUES ('$id','$nama', '$kota', '$alamat','$kontak','$telpon',0)";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_suplier.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil ditambahkan");
        header("Location:../table_suplier.php?error=$error");
    }

    mysqli_close($con);
?>