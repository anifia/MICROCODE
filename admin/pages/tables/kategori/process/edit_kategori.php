<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id     = $_POST['id'];
    $nama    = $_POST['nama'];

    $query = "UPDATE jenis_produk SET nama = '$nama' WHERE id = '$id'";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_kategori.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil diupdate");
        header("Location:../table_kategori.php?error=$error");
    }

    mysqli_close($con);
?>