<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id        = $_POST['id'];
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

    $query = "UPDATE produk SET nama = 'nama', jenis_id = '$jenis_id', stok = $stok,  harga_jual = $harga_jual, harga_beli = $harga_beli, deskripsi = '$deskripsi' WHERE id = '$id'";

    // syarat upload foto
    if(!in_array($_FILES["foto"]["type"],$tipe_file) && $nama_file != "")
    {
        $error = urldecode("Cek kembali ekstensi file anda (*.jpg,*.gif,*.png)");
        header("Location:../table_produk.php?error=$error");
    }
    else if(in_array($_FILES["foto"]["type"],$tipe_file) && $nama_file != "")
    {
        // jika gambar diubah
        $query_gambar = "SELECT foto FROM produk WHERE id=$id";
        $result       = mysqli_query($connect, $query_gambar);
        $hasil        = mysqli_fetch_assoc($result);
        $gambar       = $hasil['foto'];

        // menghapus gambar lama
        unlink('../../../../../images/'. $gambar);
        
        // upload gambar baru
        move_uploaded_file($tmp,$path);
        
        // query untuk mengupdate data + gambar
	    $query = "UPDATE produk SET nama = '$nama', jenis_id = '$jenis_id', stok = $stok, harga_beli = $harga_beli, harga_jual = $harga_jual, deskripsi = '$deskripsi', foto='$nama_file' WHERE id = '$id'";

        // menjalankan query isi data
        if (mysqli_query($con, $query))
        {
            header("Location:../table_produk.php");
        }
        else
        {
            $error = urldecode("Data tidak berhasil diupdate");
            header("Location:../table_produk.php?error=$error");
        }
    }
    else if($nama_file == "")
    {
	// query untuk mengupdate data
        $query = "UPDATE produk SET nama = '$nama', jenis_id = '$jenis_id', stok = $stok, harga_beli = $harga_beli, harga_jual = $harga_jual, deskripsi = '$deskripsi'WHERE id = '$id'";

        // menjalankan query update data
        if (mysqli_query($con, $query))
        {
            header("Location:../table_produk.php");
        }
        else
        {
            $error = urldecode("Update gagal dijalankan");
            header("Location:../table_produk.php?error=$error");
        }
    }

    mysqli_close($con);
?>
