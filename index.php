<?php
include "koneksi.php";

$query = mysqli_query($conn, "select sum(jam_ngajar) as total_jam from data_instruktur");
$data = mysqli_fetch_array($query);
$total_jam = $data['total_jam'];

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
                </span> Atur Jadwal </h3>
            </div>
			<div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <center><p id="respon"></p></center>
                    
                        <form method="POST" name="form-setting" id="form-setting">

                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Jumlah Jam Pelatihan</label>
                                <input type="number" class="form-control" min="1" max="3" id="jam" name="jam" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Senin</label>
                                <select name="senin" id="senin" class="form-control">
                                    <option value="tidak">Tidak Bisa</option>
                                    <option value="bisa">Bisa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Selasa</label>
                                <select name="selasa" id="selasa" class="form-control">
                                    <option value="tidak">Tidak Bisa</option>
                                    <option value="bisa">Bisa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Rabu</label>
                                <select name="rabu" id="rabu" class="form-control">
                                    <option value="tidak">Tidak Bisa</option>
                                    <option value="bisa">Bisa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Kamis</label>
                                <select name="kamis" id="kamis" class="form-control">
                                    <option value="tidak">Tidak Bisa</option>
                                    <option value="bisa">Bisa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Jumat</label>
                                <select name="jumat" id="jumat" class="form-control">
                                    <option value="tidak">Tidak Bisa</option>
                                    <option value="bisa">Bisa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Sabtu</label>
                                <select name="sabtu" id="sabtu" class="form-control">
                                    <option value="tidak">Tidak Bisa</option>
                                    <option value="bisa">Bisa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Tanggal Daftar *Untuk demo</label>
                                <input type="datetime-local" class="form-control" id="tgl-daftar" name="tgl-daftar" required>
                            </div>
                                                    
                            <div class="form-group">
                                <button type="submit" id="kirim" class="btn btn-gradient-primary mr-2">Submit</button>
                            </div>
                        </form>
                        
                        <script src="https://irfan.co.id/assets/js/jquery-1.4.2.min.js"></script>
                        
                        <script>
                            $("#kirim").click(function(){
                                $('#respon').html("Sedang Proses");
                                $.ajax({
                                    url: "save-pengajar.php",
                                    type: "post",
                                    data: $("form#form-setting").serialize(),
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
                <style>
#tabel-instruktur {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align-last: center;
}

#tabel-instruktur td, #tabel-instruktur th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tabel-instruktur tr:nth-child(even){background-color: #f2f2f2;}

#tabel-instruktur tr:hover {background-color: #ddd;}

#tabel-instruktur th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
                <div class="card">
                    <div class="card-body">
                        <h2>Data Instruktur</h2>
                        <p>Total jam terisi : <?php echo $total_jam; ?> Jam</p>
                        <div style="overflow-x:auto;">
                        <table id="tabel-instruktur">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama</th>
                                    <th>Jam</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                    <th>Sabtu</th>
                                    <th>Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($conn, "select * from data_instruktur where daftar >= $start or status='menunggu' order by id desc");
                                    $i = 1;
                                    while($get = mysqli_fetch_array($query)) {
                                        echo "<tr>
                                            <td>".$i."</td>
                                            <td>".$get['nama']."</td>
                                            <td>".$get['jam_ngajar']." Jam</td>
                                            <td>".(($get['senin'] == "bisa") ? '<font color="green">'.ucwords($get['senin']).'</font>' : '<font color="red">'.ucwords($get['senin']).'</font>')."</td>
                                            <td>".(($get['selasa'] == "bisa") ? '<font color="green">'.ucwords($get['selasa']).'</font>' : '<font color="red">'.ucwords($get['selasa']).'</font>')."</td>
                                            <td>".(($get['rabu'] == "bisa") ? '<font color="green">'.ucwords($get['rabu']).'</font>' : '<font color="red">'.ucwords($get['rabu']).'</font>')."</td>
                                            <td>".(($get['kamis'] == "bisa") ? '<font color="green">'.ucwords($get['kamis']).'</font>' : '<font color="red">'.ucwords($get['kamis']).'</font>')."</td>
                                            <td>".(($get['jumat'] == "bisa") ? '<font color="green">'.ucwords($get['jumat']).'</font>' : '<font color="red">'.ucwords($get['jumat']).'</font>')."</td>
                                            <td>".(($get['sabtu'] == "bisa") ? '<font color="green">'.ucwords($get['sabtu']).'</font>' : '<font color="red">'.ucwords($get['sabtu']).'</font>')."</td>
                                            <td>".date('d-m-Y H:i', $get['daftar'])."</td>
                                            <td><button id='".$get['id']."' class='btn btn-gradient-danger mr-2' onClick='hapus(this)'>Hapus</button></td>
                                        </tr>";
                                        $i++;
                                    }
                                ?>
                            </tbody>
                            </table>
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
    <script type="text/javascript">
      function hapus(data) {
        $('button#'+data.id).text("Proses")
        $.ajax({
            url: "hapus-instruktur.php",
            type: "post",
            data: "id="+data.id,
            success: function (response) {
              alert(response);
              if (response == "Berhasil Hapus Data") {
                  window.location = window.location.href;
              }
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        return false;
      }
    </script>
    


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