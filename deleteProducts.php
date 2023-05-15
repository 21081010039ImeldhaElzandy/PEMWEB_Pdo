<?php
include ('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['productCode'])) {

    //mengambil data customers yg akan dihapus
    $productCode_upd = $_GET['productCode'];
    $query = $koneksi->prepare("DELETE FROM products WHERE productCode = :productCode ");
    //binding data
    $query->bindParam(':productCode',$productCode_upd);
    //eksekusi query
    if ($query->execute()) {
      $status = 'ok';
    }
    else{
      $status = 'err';
    }
          //redirect ke halaman lain
          header('Location: tabelProducts.php?status='.$status);
      }  
  }
  ?>