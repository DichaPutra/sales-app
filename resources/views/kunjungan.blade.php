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
        @if (session('tipe')=='atasan')
        @include('includes.headeratasan')
        @elseif (session('tipe')=='admin')
        @include('includes.headeradmin')
        @else
        @include('includes.headersales')
        @endif
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    <!-- table row starts here -->
                    <!-- doughnut chart row starts -->
                    <div class="row">
                        <div class="col-sm-12 stretch-card grid-margin">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card border-1">
                                            <div class="card-body">
                                                <form>

                                                    <div class="card-title">
                                                        <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                                                          <div class="d-flex mr-5">
                                                            <i class="biru mdi mdi-target mdi-24px" style="color:blue"></i>
                                                            <div class="pl-2">
                                                              <h5 class="mb-0 font-weight-semibold head-count"> {{$target}} </h5>
                                                              <span class="font-12 font-weight-semibold text-muted">Target Kunjungan</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                                                      <div class="d-flex mr-5">
                                                        <i class="hijau mdi mdi-calendar-multiple-check mdi-24px" style="color:green"></i>
                                                        <div class="pl-2">
                                                          <h5 class="mb-0 font-weight-semibold head-count"> {{$todaykunjungan}} </h5>
                                                          <span class="font-12 font-weight-semibold text-muted">Jumlah Kunjungan</span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                                                  <div class="d-flex mr-5">
                                                    <i class="merah mdi mdi-calendar-remove mdi-24px" style="color:red"></i>
                                                    <div class="pl-2">
                                                      <h5 class="mb-0 font-weight-semibold head-count"> {{$sisakunjungan}} </h5>
                                                      <span class="font-12 font-weight-semibold text-muted">Sisa Kunjungan</span>
                                                  </div>
                                              </div>
                                          </div>
                                          @if($sisakunjungan <= 0)
                                          <button type="button" class="btn btn-secondary pull-right mb-4"><a class="text-white" href="#" style="text-decoration:none">Input Kunjungan</a></button>
                                          @else
                                          <button type="button" class="btn btn-primary pull-right mb-4"><a class="text-white" href="tambahkunjungan" style="text-decoration:none">Input Kunjungan</a></button>
                                          @endif
                                      </div>
                                  </form>
                                  <div class="table-responsive">
                                    <table class="table table-striped" id="contact-detail" class="jw-table" cellspacing="0" width="100%">
                                        <thead></thead>
                                        <tbody>
                                            <tr>
                                                <th class="priority-5" width="10%"><span><b><center>No.</center><b></span></th>
                                                    <th scope="row"><center><b>Keterangan</b></center></th>
                                                    <th scope="row"><center><b>Status</b></center></th>
                                                </tr>
                                                <?php $no=1?>
                                                @foreach($alldailykunjungan as $dt)
                                                <tr>
                                                    <td class="priority-5"><center>{{$no}}</center></td>
                                                    <td scope="row" class="title">{{$dt->nama_perusahaan}}</center></td>
                                                    <td>
                                                        <center>
                                                            @if ($dt->status == 'tercapai')  
                                                            <div class="box-hijau"></div>
                                                            @elseif ($dt->status == 'tidak tercapai')
                                                            <div class="box-merah"></div>
                                                            @elseif ($dt->status == 'ditolerir')
                                                            <div class="box-kuning"></div>
                                                            @endif

                                                        </center>
                                                    </td>
                                                </tr>
                                                <?php $no++?>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- last row starts here -->
<!-- content-wrapper ends -->
</body>
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
</div>
<style>
    div{
    }
    .box-kuning{ width: 20px; height:20px; background: #FFD700; border-radius: 100%}
    .box-hijau{ width: 20px; height:20px; background: #7FFF00; border-radius: 100%}
    .box-merah{ width: 20px; height:20px; background: red; border-radius: 100%}

    @media screen and (max-width: 900px) and (min-width: 550px) {
      .priority-5{
        display:none;
    }
}

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
i {
}
.biru{ height: 35px;width: 35px;border-radius: 4px;border: 2px solid blue;text-align: center;}
.hijau{ height: 35px;width: 35px;border-radius: 4px;border: 2px solid green;text-align: center;}
.merah{ height: 35px;width: 35px;border-radius: 4px;border: 2px solid red;text-align: center;}
}
}
</style>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
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
<!-- Custom js for this page -->
<script src="../assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
</body>
</html>