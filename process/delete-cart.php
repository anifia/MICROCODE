<?php 
session_start();
$id = $_GET["id"];

$jumlahx = 0;

foreach ($_SESSION["keranjang"] as $id => $jumlah) 
{
	$jumlahx++;
}

if($jumlahx == 1)
{
    unset($_SESSION['keranjang']);
    unset($_SESSION['nomor']); 
}
else
{
    unset($_SESSION["keranjang"][$id]);
}

header('location:../cart.php');
?>