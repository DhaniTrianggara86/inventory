<?php
    require_once "config/database.php";
    $id = $_GET['id_konsumen'];

 
    $query = mysqli_query($mysqli,"UPDATE tbl_konsumen SET aktif = 'Y' WHERE id_konsumen = '$id' ") or die (mysqli_error($mysqli));
 
    if($query) {
        header("location: ../../hp/main.php?page=home");
    } else {
        echo "Gagal diaktifkan";
    }
?>