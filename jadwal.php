<?php
include "koneksi.php";


$tidak_ikut = array();
$total_alokasi = 0;
$total_jam = 0;

$query = mysqli_query($conn, "select * from data_instruktur where status='menunggu' and daftar >= ".$start." and daftar <= ".$end);

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
    } else {
        $total_jam = $total_jam + $get['jam_ngajar'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
<title>Irfan.co.id</title>
<meta name="description" content="Irfan.co.id - Menyediakan layanan gratis API & Tools Gratis Seperti Cek Mutasi, Cek Nama Rekening, Hadist, Tools Dropship gratis, dan masih banyak lagi">
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Irfan.co.id - Layanan Tools Gratis" />
<meta property="og:description" content="Irfan.co.id - Menyediakan layanan gratis API & Tools Gratis Seperti Cek Mutasi, Cek Nama Rekening, Hadist, Tools Dropship gratis, dan masih banyak lagi" />
<meta property="og:url" content="https://irfan.co.id" />
<meta property="og:image" content="https://irfan.co.id/https://irfan.co.id/assets/images/logo.svg" />
<meta property="og:image:secure_url" content="https://irfan.co.id/https://irfan.co.id/assets/images/logo.svg" />
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="200" />    <!-- plugins:css -->
    <link rel="stylesheet" href="https://irfan.co.id/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://irfan.co.id/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="https://irfan.co.id/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://irfan.co.id/assets/images/favicon.png" />

<style>
#tabel-jadwal {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align-last: center;
}

#tabel-jadwal td, #tabel-jadwal th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tabel-jadwal tr:nth-child(even){background-color: #f2f2f2;}

#tabel-jadwal tr:hover {background-color: #ddd;}

#tabel-jadwal th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href=""><img src="https://irfan.co.id/assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href=""><img src="https://irfan.co.id/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">

<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#ui-ekoji2" aria-expanded="false" aria-controls="ui-ekoji2">
    <span class="menu-title">Smart Scheduling</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="ui-ekoji2">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="index.php">Daftar Instruktur</a></li>
      <li class="nav-item"> <a class="nav-link" href="jadwal.php">Jadwal Instruktur</a></li>
    </ul>
  </div>
</li>
</ul>        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Jadwal Istruktur </h3>
            </div>
			<div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    
                    <h2>Jadwal Instruktur</h2>
                        <div class="form-group">
                            <button type="submit" id="kirim" class="btn btn-gradient-primary mr-2">Update Jadwal</button>
                        </div>
                          <div id="respon" style="overflow-x:auto;">
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
                          </div>

                        <script src="https://irfan.co.id/assets/js/jquery-1.4.2.min.js"></script>
                        
                        <script>
                            $("#kirim").click(function(){
                                $('#respon').html("Sedang Proses");
                                $.ajax({
                                    url: "buat-jadwal.php",
                                    type: "post",
                                    data: "update=true",
                                    success: function (response) {
                                        $('#respon').html(response);
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        console.log(textStatus, errorThrown);
                                    }
                                });
                                $('html, body').animate({ scrollTop: 0 }, 0);
                                //nice and slow :)
                                $('html, body').animate({ scrollTop: 0 }, 'slow');
                                return false;
                            });

                        </script>

                    </div>
                    </div>
                </div>
            </div>

            
            
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://irfan.co.id/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="https://irfan.co.id/assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="https://irfan.co.id/assets/js/off-canvas.js"></script>
    <script src="https://irfan.co.id/assets/js/hoverable-collapse.js"></script>
    <script src="https://irfan.co.id/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="https://irfan.co.id/assets/js/dashboard.js"></script>
    <script src="https://irfan.co.id/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>