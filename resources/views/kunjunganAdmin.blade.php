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
        @include('includes.headeradmin')       <!-- partial -->
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
                                                <div class="card-title">
                                                    <h4 class="card-title">Nama Sales</h4>
                                                    <div class="container">
                                                      <div class="panel-body">
                                                        <div class="form-group">
                                                          <select name="nama_sales" class="form-control">
                                                            <option>Nicholas Saputera</option>
                                                            <option>Dian Sastro</option>
                                                            <option>Reza Rahardian</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="card-title">Bulan</h4>
                                            <div class="container">
                                              <div class="panel-body">
                                                <div class="form-group">
                                                  <select name="bulan" class="form-control">
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </form>
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
                                            <th scope="row"><center><b>Action</b></center></th>
                                        </tr>
                                        <tr>
                                            <td class="priority-5"><center>1</center></td>
                                            <td scope="row" class="title">Tidak Melakukan Kunjungan</center></td>
                                            <td>
                                                <center>
                                                    <div class="box-merah"></div>
                                                </center></td>
                                                <td><div class="toolbox">
                                                    <center>
                                                        <a style="color: blue;font-size:20px"><i class="mdi mdi-pencil" data-toggle="modal" data-target="#rubahStatusModal"></i></a>
                                                        &emsp;
                                                        <a style="color: #cc0000;font-size:20px"><i class="mdi mdi-delete" data-toggle="modal" data-target="#hapusModal"></i></a>
                                                    </center>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td class="priority-5"><center>2</center></td>
                                                <td scope="row" class="title">PT. Indofood</center></td>
                                                <td>
                                                    <center>
                                                        <div class="box-hijau"></div>
                                                    </center></td>
                                                    <td><div class="toolbox">
                                                        <center>
                                                            <a style="color: blue;font-size:20px"><i class="mdi mdi-pencil" data-toggle="modal" data-target="#editModal"></i></a>
                                                            &emsp;
                                                            <a style="color: #cc0000;font-size:20px"><i class="mdi mdi-delete" data-toggle="modal" data-target="#hapusModal"></i></a>
                                                        </center>
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="priority-5"><center>3</center></td>
                                                    <td scope="row" class="title">Tidak Melakukan Kunjungan</center></td>
                                                    <td>
                                                        <center>
                                                            <div class="box-kuning"></div>
                                                        </center></td>
                                                        <td><div class="toolbox">
                                                            <center>
                                                                <a style="color: blue;font-size:20px"><i class="mdi mdi-pencil" data-toggle="modal" data-target="#rubahStatusModal"></i></a>
                                                                &emsp;
                                                                <a style="color: #cc0000;font-size:20px"><i class="mdi mdi-delete" data-toggle="modal" data-target="#hapusModal"></i></a>
                                                            </center>
                                                        </div></td>
                                                    </tr>
                                                    <!-- Modal Rubah Status-->
                                                    <div id="rubahStatusModal" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- konten modal-->
                                                            <div class="modal-content">
                                                                <!-- heading modal -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Rubah Status Capaian</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <!-- body modal -->
                                                                <div class="modal-body">
                                                                  <select name="nama_sales" class="form-control">
                                                                    <option>Tidak Tercapai</option>
                                                                    <option>Disetujui</option>
                                                                    <option>Tidak Disetujui</option>
                                                                </select>
                                                            </div>
                                                            <!-- footer modal -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary pull-right mb-4">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Edit Data Kunjungan-->
                                                <div id="editModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- konten modal-->
                                                        <div class="modal-content">
                                                            <!-- heading modal -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Kunjungan</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                            </div>
                                                            <!-- body modal -->
                                                            <div class="modal-body">
                                                             <label for="nama_pic">Customer</label>
                                                             <input name="customer" class="form-control" type="text"/>
                                                             <br>

                                                             <label for="nama_pic">Nama PIC yang ditemui</label>
                                                             <input name="namapic" type="text" class="form-control" id="nama_pic"><br>

                                                             <label for="contact_no_pic">Kontak PIC yang ditemui</label>
                                                             <input name="kontakpic" type="number" class="form-control" id="contact_no_pic"><br>

                                                             <label for="produk">Produk yang akan dibeli</label>
                                                             <textarea name="produk"class="form-control" id="produk"></textarea><br>

                                                             <label for="harga">Kisaran Harga</label>
                                                             <input name="kisaranharga" type="number" min="1" step="any" class="form-control" id="harga"><br>

                                                             <label for="waktu_pembelian">Perkiraan Waktu Pembelian</label>
                                                             <input name="waktu" class="form-control" type="date" value="" id="example-date-input"><br>

                                                             <label for="lainlain">Lain - Lain</label>
                                                             <textarea name="lainlain" type="text" class="form-control" id="lainlain"></textarea><br>

                                                             <label for="foto">Foto saat kunjungan</label><br>
                                                             <input name="filefoto" type="file">
                                                         </div>
                                                         <!-- footer modal -->
                                                         <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary pull-right mb-4">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Hapus Data Kunjungan-->
                                            <div id="hapusModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- konten modal-->
                                                    <div class="modal-content">
                                                        <!-- heading modal -->
                                                        <div class="modal-header">
                                                                <h4 class="modal-title"></h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                        <!-- body modal -->
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin menghapus kunjungan ini ?</p>
                                                        </div>
                                                        <!-- footer modal -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger pull-right mb-4">Ya</button>
                                                            <button type="button" class="btn btn-primary pull-right mb-4">Tidak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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