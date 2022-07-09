<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id = $_GET['id'];

    $query = "UPDATE suplier SET deleted = 1 WHERE id = '$id'";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_suplier.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil dihapus");
        header("Location:../table_suplier.php?error=$error");
    }

    mysqli_close($con);
?>