<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id = $_GET['id'];

    $query = "UPDATE produk SET deleted = 1 WHERE id = '$id'";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_produk.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil dihapus");
        header("Location:../table_produk.php?error=$error");
    }

    mysqli_close($con);
?>