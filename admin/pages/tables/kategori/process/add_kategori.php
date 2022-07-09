<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];

    $query = "INSERT INTO jenis_produk (id, nama, deleted) VALUES ('$id','$nama',0)";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_kategori.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil ditambahkan");
        header("Location:../table_kategori.php?error=$error");
    }

    mysqli_close($con);
?>