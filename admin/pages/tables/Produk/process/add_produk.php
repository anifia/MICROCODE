<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id       = $_POST['id'];
    $nama     = $_POST['nama'];
    $jenis_id    = $_POST['jenis_id'];
    $stok           = $_POST['stok'];
    $harga_beli          = $_POST['harga_beli'];
    $harga_jual          = $_POST['harga_jual'];
    $deskripsi      = $_POST['deskripsi'];

    $nama_folder    = "images";
    $nama_file      = $_FILES["foto"]["name"];
    $tmp            = $_FILES["foto"]["tmp_name"];
    $path           = "../../../../../$nama_folder/$nama_file";
    $tipe_file      = array("image/jpeg","image/png","image/jpg");

    $query = "INSERT INTO produk VALUES ('$id','$nama','$jenis_id', '$stok', '$harga_beli', '$harga_jual', '$deskripsi','$nama_file',0)";

    if(!in_array($_FILES["foto"]["type"],$tipe_file) && $nama_file != "")
    {
        $error = urldecode("Cek kembali ekstensi file anda (*.jpg,*.gif,*.png)");
        header("Location:../table_produk.php?error=$error");
    }
    else if(in_array($_FILES["foto"]["type"],$tipe_file) && $nama_file != "")
    {
        if (mysqli_query($con, $query))
        {
            move_uploaded_file($tmp,$path);
            header("Location:../table_produk.php");
        }
        else
        {
            $error = urldecode("Data tidak berhasil ditambahkan");
            header("Location:../table_produk.php?error=$error");
        }
    mysqli_close($con);
    }
?>