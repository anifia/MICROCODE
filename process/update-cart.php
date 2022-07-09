<?php
include 'helper/connection.php';
session_start();

$id = $_GET['id'];
$_SESSION['nomor']+=1;

//sudah ada
if(isset($_SESSION['keranjang'][$id]))
{
    $_SESSION['keranjang'][$id]+=1;
    
}
//belum ada
else
{
    $_SESSION['keranjang'][$id] = 1;
}

header("location:../cart.php");

?>