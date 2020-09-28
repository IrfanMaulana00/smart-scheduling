<?php

include("koneksi.php");

if ($_POST) {
    
//$get_senin = $hari[date("N", strtotime("-".(array_search($hari[date('N', time())], $hari)-1)." days", time()))];
//$posisi = strtotime("-".date("N", time())." days", time());
//$hari_senin = $hari[date("N", strtotime("-".$posisi." days", time()))];


$reset = mysqli_query($conn, "update data_instruktur set status='menunggu' where status='terjadwal' and daftar>=".$start." and daftar <= ".$end);

$query = mysqli_query($conn, "select * from data_instruktur where status='menunggu' and daftar>=".$start." and daftar <= ".$end);
$cek = mysqli_num_rows($query);
if ($cek == 0) {
    echo "Silahkan isi data instruktur"; die;
}

    $instruktur = array();
    foreach ($jadwal as $days) {
        $day = strtolower($days);
        $instruktur[$day] = array();
        $query = mysqli_query($conn, "select GROUP_CONCAT(nama) as nama from data_instruktur where $day='bisa' and status='menunggu' and daftar>=".$start." and daftar <= ".$end);
        $cek = mysqli_num_rows($query);
        
        $get = mysqli_fetch_array($query);
        
        foreach(explode(",", $get['nama']) as $nama) {
            array_push($instruktur[$day], $nama);
        }
    }
    

function cek_terpakai($hari, $data, $nama) {
    $status = false;
    foreach ($hari as $hari1) {
        if (isset($data[strtolower($hari1)])){
                if (in_array($nama, $data[strtolower($hari1)]['instruktur'])) {
                    $status = true;
                    break;
                }
            
        }else{
            continue;
        }
    }
    return $status;
}

    /* atur jadwal ajar */
    $fix = array();
    foreach($jadwal as $jadwal1) {
        $jadwal1 = strtolower($jadwal1);
        $fix[$jadwal1] = array("jam" => 0, "instruktur" => array());
        $status = false;

        foreach($instruktur[$jadwal1] as $instruk) {
            $cek_status = cek_terpakai($jadwal, $fix, $instruk);
            if ($cek_status != true) {
                $query = mysqli_query($conn, "select * from data_instruktur where nama='".$instruk."' and daftar>=".$start." and daftar <= ".$end);
                $cek = mysqli_num_rows($query);
                if ($cek > 0){
                    $get = mysqli_fetch_array($query);
                    if ($fix[$jadwal1]['jam'] < 8) {
                        if ($fix[$jadwal1]['jam'] + $get['jam_ngajar'] <= 8) {
                            $fix[$jadwal1]['jam'] = $fix[$jadwal1]['jam'] + $get['jam_ngajar'];
                            array_push($fix[$jadwal1]['instruktur'], $instruk);
                        }
                    } else {
                        continue;
                    }
                }
            }
        }
        
    }
    
    /* total jam & tidak ikut*/
    $total_jam = 0;
    $tidak_ikut = array();
    $total_alokasi = 0;
    foreach($fix as $val => $fix1) {
        $total_jam = $total_jam + $fix1['jam'];
    }

    $query = mysqli_query($conn, "select * from data_instruktur where status='menunggu' and daftar>=".$start." and daftar <= ".$end);
    while($get = mysqli_fetch_array($query)) {
        $x = 0;
        foreach($jadwal as $jadwal1) {
            $jadwal1 = strtolower($jadwal1);
            $query_cek = mysqli_query($conn, "select * from jadwal_ngajar where $jadwal1='".$get['nama']."'");
            $cek = mysqli_num_rows($query_cek);
            $x = $x + $cek;
        }
        if ($x == 0) {
            array_push($tidak_ikut, $get['nama']." (".$get['jam_ngajar'].")");
            $total_alokasi = $total_alokasi + $get['jam_ngajar'];
        }
    }
    
    /* insert database */
    $waktu_jadwal = array('08.00-09.00', '09.00-10.00', '10.00-11.00', '11.00-12.00', '12.00-13.00', '13.00-14.00', '14.00-15.00', '15.00-16.00');
    $clear = mysqli_query($conn, "update jadwal_ngajar set senin='', selasa='', rabu='', kamis='', jumat='', sabtu=''");
    foreach ($fix as $val => $datafix) {
        $jam = 8;
        $start = 0;
        
        foreach($datafix['instruktur'] as $nama_instruktur) {
            $query = mysqli_query($conn, "select * from data_instruktur where nama='".$nama_instruktur."'");
            $cek = mysqli_num_rows($query);
            
            $get = mysqli_fetch_array($query);
            for($x = 1; $x <= $get['jam_ngajar']; $x++) {
                    $update = mysqli_query($conn, "update data_instruktur set status='terjadwal' where nama='".$nama_instruktur."' and daftar>=".$start." and daftar <= ".$end." order by id desc limit 1");
                    $update = mysqli_query($conn, "update jadwal_ngajar set $val='".$nama_instruktur."' where jadwal='".$waktu_jadwal[$start]."'");
                
                $start++;
            }
        }
    }
    
    if (count($fix) > 0) {  ?>
            <table id="tabel-jadwal">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Sabtu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = mysqli_query($conn, "select * from jadwal_ngajar order by id asc");
                        $i = 1;
                        while($get = mysqli_fetch_array($query)) {
                            echo "<tr>
                                <td>".$get['jadwal']."</td>
                                <td>".$get['senin']."</td>
                                <td>".$get['selasa']."</td>
                                <td>".$get['rabu']."</td>
                                <td>".$get['kamis']."</td>
                                <td>".$get['jumat']."</td>
                                <td>".$get['sabtu']."</td>
                            </tr>";
                            $i++;
                        }
                    ?>
                </tbody>
            </table>
            <br>
            <p>Total : <?php echo $total_jam; ?> Jam</p>
            <p>Total yang tidak bisa dialokasikan adalah : <?php echo $total_alokasi; ?> Jam</p>
            <p>Nama yang baru bisa mengajar minggu berikutnya adalah : <?php echo implode(", ", $tidak_ikut); ?></p>
    <?php    
    }
}

?>