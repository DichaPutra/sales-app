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
                        <div class="card">
                            <form method="POST" action="{{route('updatecustomer')}}">
                                @csrf
                                <div class="card-body">
                                    <div>
                                        <button type="kembali" class="btn-primary"><a class="text-white" href="customer"><i class="mdi mdi-arrow-left-bold"></i></a></button>
                                    </div>
                                    <br>
                                    <h4 class="card-title"></h4>
                                    <form class="forms-sample" method="post">
                                        <input type="hidden" name="idcustomer" value="{{$datacustomer->id}}">
                                        <div class="form-group">
                                            <label>Nama Perusahaan</label>
                                            <input value="{{$datacustomer->nama_perusahaan}}" name="nama_perusahaan" type="text" class="form-control" id="namaperusahaan" placeholder="Nama Perusahaan" />
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Perusahaan</label>
                                            <textarea name="alamat_perusahaan" type="text" class="form-control" id="alamatperusahaan" placeholder="Alamat Perusahaan">{{$datacustomer->alamat}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kontak Perusahaan</label>
                                            <input value="{{$datacustomer->contact_no_perusahaan}}" name="kontak_perusahaan" type="text" class="form-control" id="kontakperusahaan" placeholder="Kontak Perusahaan" />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama PIC</label>
                                            <input value="{{$datacustomer->nama_pic}}" name="nama_pic" type="text" class="form-control" id="namapic" placeholder="Nama PIC" />
                                        </div>
                                        <div class="form-group">
                                            <label>Email PIC</label>
                                            <input value="{{$datacustomer->email}}" name="email_pic" type="text" class="form-control" id="emailpic" placeholder="Email PIC" />
                                        </div>
                                        <div class="form-group">
                                            <label>Kontak PIC</label>
                                            <input value="{{$datacustomer->contact_no_pic}}"name="kontak_pic" type="text" class="form-control" id="kontakpic" placeholder="Kontak PIC" />
                                        </div>
                                        <div class="form-group">
                                            <label>Sosial Media</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-dark text-white"><i class="mdi mdi-whatsapp"></i></span>
                                                    </div>
                                                    <input value="{{$datacustomer->wa}}" name="wa" type="text" class="form-control" placeholder="Whatsapp" />
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-dark text-white"><i class="mdi mdi-facebook"></i></span>
                                                    </div>
                                                    <input  value="{{$datacustomer->fb}}" name="fb" type="text" class="form-control" placeholder="Facebook" />
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-dark text-white"><i class="mdi mdi-twitter"></i></span>
                                                    </div>
                                                    <input value="{{$datacustomer->twitter}}" name="twitter" type="text" class="form-control" placeholder="Twitter" />
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                                        </div>
                                    </form>
                                </div>
                            </form>
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
            </div>
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