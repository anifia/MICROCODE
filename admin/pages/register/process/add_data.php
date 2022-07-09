<?php
    include('../../../../helper/connection.php');

    $id        = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email      = $_POST['email'];

    $query = "INSERT INTO users VALUES ('$id','$username','$password', '$email',0)";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../index.php");
    }
    else
    {
        echo "<script type='text/javascript'>
	    alert('Login Gagal!')
	    </script>";
        header("Location:../index.php");
    }

    mysqli_close($con);

?>