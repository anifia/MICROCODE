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

    $query = "UPDATE suplier SET nama = '$nama', kota = '$kota', alamat = '$alamat', kontak ='$kontak', telpon='$telpon' WHERE id = '$id'";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_suplier.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil diupdate");
        header("Location:../table_suplier.php?error=$error");
    }

    mysqli_close($con);
?>