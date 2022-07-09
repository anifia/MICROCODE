<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id       = $_POST['id'];
    $username    = $_POST['username'];
    $password      = $_POST['password'];

    $query = "INSERT INTO users VALUES ('$username','$password','$id', 0)";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_user.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil ditambahkan");
        header("Location:../table_user.php?error=$error");
    }

    mysqli_close($con);
?>