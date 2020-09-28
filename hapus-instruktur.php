<?php
include "koneksi.php";

if ($_POST and isset($_POST['id']) and $_POST['id'] != null) {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = mysqli_query($conn, "select * from data_instruktur where id=".$id);
    $cek = mysqli_num_rows($query);
    if ($cek == 0) {
        echo "Data instruktur tidak ditemukan";
    } else {
        $hapus = mysqli_query($conn, "delete from data_instruktur where id=".$id);
        if ($hapus) {
            echo "Berhasil Hapus Data";
        }
    }

}

?>