<?php

include("koneksi.php");

if ($_POST) {

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jam = mysqli_real_escape_string($conn, $_POST['jam']);
    $senin = mysqli_real_escape_string($conn, $_POST['senin']);
    $selasa = mysqli_real_escape_string($conn, $_POST['selasa']);
    $rabu = mysqli_real_escape_string($conn, $_POST['rabu']);
    $kamis = mysqli_real_escape_string($conn, $_POST['kamis']);
    $jumat = mysqli_real_escape_string($conn, $_POST['jumat']);
    $sabtu = mysqli_real_escape_string($conn, $_POST['sabtu']);
    $tgl_daftar = strtotime($_POST['tgl-daftar']);

    if ($jam < 1 or $jam > 3) {
        echo "Waktu hanya bisa di input antara 1 - 3"; die;
    }

    if ($nama != null and $jam != null) {

        $query = mysqli_query($conn, "select sum(jam_ngajar) as total_jam from data_instruktur where daftar>=".$start." and daftar <= ".$end);
        $data = mysqli_fetch_array($query);
        $total_jam = $data['total_jam'];
        if (($total_jam+$jam) <= 62) {
            $save = mysqli_query($conn, "INSERT INTO data_instruktur 
            (nama, jam_ngajar, senin, selasa, rabu, kamis, jumat, sabtu, daftar) VALUES 
            ('".$nama."', $jam, '".$senin."', '".$selasa."', '".$rabu."', '".$kamis."', '".$jumat."', '".$sabtu."', ".(($tgl_daftar != 0) ? $tgl_daftar : time()).")");
                
            if ($save) {
                echo "Data sukses di simpan, Jam terisi : ".($data['total_jam'] + $jam)." Jam";
            } else {
                echo "Data gagal di simpan";
            }
        }else{
            echo "Maaf, jam tersedia sisa ".(62-$total_jam)." Jam";
        }
    }

}

?>