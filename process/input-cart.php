<?php
include '../helper/connection.php';
session_start();

if($_SESSION['id'] == '')
{
    header('location:../admin/index.php');
}
else
{
    $tampilkan_isi = "select count(id) as jumlah from pembelian";
    $tampilkan_isi_sql = mysqli_query($con,$tampilkan_isi);
    $no = 1;
    while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
    {
        $no=$no+$isi['jumlah'];
    }

    foreach ($_SESSION["keranjang"] as $id => $jumlah) 
    {
        $ambil = $con->query("SELECT * FROM produk WHERE id='$id'");
        $pecah = $ambil->fetch_assoc();
        $id = $pecah["id"];
        $subharga =$pecah["harga_jual"]*$jumlah;

        $query = $con->query("INSERT INTO pembelian (id, tanggal, jumlah, harga_jual) VALUES ('id', now(),'jumlah','harga')");
        
        if($query)
        {
            $newqty = $pecah['stok'] - $jumlah;
            $con->query("UPDATE produk SET stok = $newqty WHERE id = '$id'");
        }
        else
        {
            echo "<script>alert('tranksaksi gagal!');</script>";
        }

        $no++;
    }

    unset($_SESSION['keranjang']);
    unset($_SESSION['nomor']);
    header('location:../order.php');
}
?>