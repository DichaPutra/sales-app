<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Sales Project</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../assets/vendors/jquery-bar-rating/css-stars.css" />
  <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../assets/css/demo_2/style.css" />
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../assets/images/econ.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    @include('includes.headeratasan')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper pb-0">
          <!-- table row starts here -->
          <!-- doughnut chart row starts -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Nama Karyawan</h4>
              <form method="GET" action="{{route('laporan')}}"class="forms-sample">
                  @csrf
                <div class="container">
                  <div class="panel-body">
                    <div class="form-group">
                        <select name="iduser" class="selectpicker form-control" data-live-search="true" onchange='this.form.submit()'>
                            <option value="null">Pilih Sales ...</option>
                            @foreach ($user as $user)
                            <option value="{{$user->id}}" 
                                    @if($userid == $user->id)
                                        selected
                                    @endif
                                    >
                                {{$user->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <h4 class="card-title">Bulan</h4>
                <div class="container">
                  <div class="panel-body">
                    <div class="form-group">
                      <select name="bulan" class="selectpicker form-control" data-live-search="false" onchange='this.form.submit()'>
                        <option value="1" @if($bulan == 1 or $bulannow == 1) selected @endif >Januari</option>
                        <option value="2" @if($bulan == 2 or $bulannow == 2) selected @endif >Februari</option>
                        <option value="3" @if($bulan == 3 or $bulannow == 3) selected @endif >Maret</option>
                        <option value="4" @if($bulan == 4 or $bulannow == 4) selected @endif >April</option>
                        <option value="5" @if($bulan ==5 or $bulannow == 5) selected @endif >Mei</option>
                        <option value="6" @if($bulan ==6 or $bulannow == 6) selected @endif >Juni</option>
                        <option value="7" @if($bulan ==7 or $bulannow == 7) selected @endif >Juli</option>
                        <option value="8" @if($bulan ==8 or $bulannow == 8) selected @endif >Agustus</option>
                        <option value="9" @if($bulan ==9 or $bulannow == 9) selected @endif >September</option>
                        <option value="10" @if($bulan ==10 or $bulannow == 10) selected @endif >Oktober</option>
                        <option value="11" @if($bulan ==11 or $bulannow == 11) selected @endif >November</option>
                        <option value="12" @if($bulan ==12 or $bulannow == 12) selected @endif >Desember</option>
                      </select>
                    </div>
                  </div>
                </div>

              </form>
              <h2 class="text-center"><?php echo $namasales; ?></h2>
              <div class="table-responsive">
                <table class="table table-striped" id="contact-detail" class="jw-table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="priority-5" width="10%" height="50%" align="center" valign="middle"><b><center>Tgl.</center><b></th>
                        <th scope="col" class="column-primary"><center>target<i class="mdi mdi-checkbox-marked-circle-outline" style="font-size:25px;color:green"></i></center></th>
                        <th scope="col" class="column-primary"><center>input<i class="mdi mdi-minus-circle-outline" style="font-size:25px;color:red"></i></center></th>
                        <th scope="col" class="column-primary"><center>tercapai<i class="mdi mdi-alert-outline" style="font-size:25px;color:#FFD700"></i></center></th>
                        <th scope="col" class="column-primary"><center>tidak tercapai<i class="mdi mdi-close" style="font-size:25px;color:red"></i></center></th>
                      <th scope="col" class="column-primary"><center>disetujui<i class="mdi mdi-close" style="font-size:25px;color:red"></i></center></th>
                      <th scope="col" class="column-primary"><center>tidak disetujui<i class="mdi mdi-close" style="font-size:25px;color:red"></i></center></th>
                        </tr>
                    </thead>
                    <tbody>
                      
                            <?php $tercapai=0; $tidaktercapai=0; $disetujui=0; $tidakdisetujui=0;?>
                          @if ($kunjungan != null)
                          @foreach($kunjungan as $kunj)
                          <tr>
                                <td class="priority-5"><center>{{$kunj->tanggal}}</center></td>
                                <td scope="row" class="title"><center>{{$kunj->target}}</center></td>
                                <td scope="row" class="title"><center>{{$kunj->input}}</center></td>
                                <td scope="row" class="title"><center>{{$kunj->tercapai}}</center></td>
                                <td scope="row" class="title"><center>{{$kunj->tidak_tercapai}}</center></td>
                                <td scope="row" class="title"><center>{{$kunj->disetujui}}</center></td>
                                <td scope="row" class="title"><center>{{$kunj->tidak_disetujui}}</center></td>
                                <?php 
                                $tercapai+=$kunj->tercapai;
                                $tidaktercapai+=$kunj->tidak_tercapai;
                                $disetujui+=$kunj->disetujui;
                                $tidakdisetujui+=$kunj->tidak_disetujui;
                                ?>
                        </tr>
                          @endforeach
                          @endif
                      
                    <tr>
                      <td class="priority-5"><center><b>TOTAL</b></center></td>
                      <td scope="row" class="title"><center><b></b></center></td>
                      <td scope="row" class="title"><center><b></b></center></td>
                      <td scope="row" class="title"><center><b>{{$tercapai}}</b></center></td>
                      <td scope="row" class="title"><center><b>{{$tidaktercapai}}</b></center></td>
                      <td scope="row" class="title"><center><b>{{$disetujui}}</b></center></td>
                      <td scope="row" class="title"><center><b>{{$tidakdisetujui}}</b></center></td>
                    </tr>
                  </tbody>
                </div>
              </div>
            </div>
          </td> 
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<!-- last row starts here -->
<div class="row">
  <div class="col-sm-6 col-xl-4 stretch-card grid-margin">

  </div>
</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">
  <div class="container">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © KPI Pakerin 2021</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="https://www.pakerin.co.id/" target="_blank">PT. Pakerin</a></span>
    </div>
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
<style> 
  @media screen and (max-width: 550px) {
    .priority-5{
      display:none;
    }
  }

  @media screen and (max-width: 300px) {
    .priority-5{
      display:none;
    }

  }
</style>
</div>
<!-- container-scroller -->
<script type="text/javascript">
  $(document).ready(function() {
    $('a.more').click(function() {

    // Toggle Class
    $tr = $(this).parent().parent();
    $tr.toggleClass('expanded');
    
    // Tampilkan - sembunyikan baris
    $i = $(this).children('i');
    $i.removeClass('fa-chevron-down', 'fa-chevron-up');
    var arrow = $tr.hasClass('expanded') ? 'fa-chevron-up' : 'fa-chevron-down';
    $i.addClass(arrow);
    
    return false;
  });
  })
</script>
<!-- plugins:js -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="../assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
<script src="../assets/vendors/chart.js/Chart.min.js"></script>
<script src="../assets/vendors/flot/jquery.flot.js"></script>
<script src="../assets/vendors/flot/jquery.flot.resize.js"></script>
<script src="../assets/vendors/flot/jquery.flot.categories.js"></script>
<script src="../assets/vendors/flot/jquery.flot.fillbetween.js"></script>
<script src="../assets/vendors/flot/jquery.flot.stack.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/hoverable-collapse.js"></script>
<script src="../assets/js/misc.js"></script>
<script src="../assets/js/settings.js"></script>
<script src="../assets/js/todolist.js"></script>
<!-- endinject -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<!-- Custom js for this page -->
<script src="../assets/js/dashboard.js"></script>
<script src="../../../assets/js/file-upload.js"></script>
<script src="../../../assets/js/typeahead.js"></script>
<!-- End custom js for this page -->
</body>
</html>