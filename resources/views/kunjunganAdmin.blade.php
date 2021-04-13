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
                                                
                                                <!-- form 
                                                ===========================================================
                                                -->
                               <form method="GET" action="{{route('kunjunganAdmin')}}"class="forms-sample">
                                    @csrf
                                                <div class="card-title">
                                                    <br>
                                                    <h4 class="card-title">Nama Sales</h4>
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
                                    </div>
                               </form>
                        <h2 class="text-center"><?php echo $namasales; ?></h2>
                        <div class="table-responsive">
                            <table class="table table-striped" id="contact-detail" class="jw-table" cellspacing="0" width="100%">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <th class="priority-5" width="10%"><span><b><center>Tgl.</center><b></span></th>
                                        <th scope="row"><center><b>Keterangan</b></center></th>
                                        <th scope="row"><center><b>Status</b></center></th>
                                        <th scope="row"><center><b>Action</b></center></th>
                                    </tr>

                          @if ($kunjungan != null)
                          @foreach($kunjungan as $kunj)
                                <tr>
                                  <td class="priority-5"><center>{{$kunj->tanggal}}</center></td>
                                  <td scope="row" class="title">{{$kunj->nama_perusahaan}}</td>
                                  <td scope="row" class="title">
                                      @if ($kunj->status == 'tercapai')
                                        <center>
                                            <div class="box-hijau"></div>
                                        </center>
                                        @elseif ($kunj->status == 'disetujui')
                                        <center>
                                            <div class="box-kuning"></div>
                                        </center>
                                        @else
                                        <center>
                                            <div class="box-merah"></div>
                                        </center>
                                      @endif
                                  </td>
                                  <td scope="row" class="title">
                                                <div class="toolbox">
                                                    <center>
                                                        @if ($kunj->status == 'tercapai')
                                                        <a style="color: blue;font-size:20px"><i class="mdi mdi-pencil" data-toggle="modal" data-target="#editModal{{$kunj->id}}"></i></a>
                                                        @else
                                                        <a style="color: blue;font-size:20px"><i class="mdi mdi-pencil" data-toggle="modal" data-target="#rubahStatusModal{{$kunj->id}}"></i></a>
                                                        @endif
                                                        &emsp;
                                                        <a href="{{url('deleteKunjungan/'.$kunj->id)}}"style="color: #cc0000;font-size:20px" onClick="return confirm('Apakah anda yakin menghapus kunjungan ini ?')"><i class="mdi mdi-delete"></i></a>
                                                    </center>
                                                </div>
                                         </td>
                                </tr>
                                    
                                                    <!-- =======================================
                                                    ========= Modal Rubah Status ========= 
                                                    ============================================-->
                                                    <div id="rubahStatusModal{{$kunj->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- konten modal-->
                                                            <div class="modal-content">
                                                                
                                                                <!-- heading modal -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Rubah Status Capaian</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <!-- body modal -->
                                                                <form method="GET" action="{{route('updateStatusKunjungan')}}">
                                                                    <input type="hidden" name="idkunjungan" value="{{$kunj->id}}">
                                                                    <div class="modal-body">
                                                                        <h4>Alasan :</h4>
                                                                        {{$kunj->alasan}}<br><br><br>
                                                                        
                                                                     <h4>Status : </h4>   
                                                                    <select name="status" class="form-control">
                                                                        <option value="tidak tercapai" @if ($kunj->status == 'tidak tercapai') selected @endif >Tidak Tercapai</option>
                                                                        <option value="disetujui" @if ($kunj->status == 'disetujuii') selected @endif >Disetujui</option>
                                                                        <option value="tidak disetujui" @if ($kunj->status == 'tidak disetujui') selected @endif >Tidak Disetujui</option>
                                                                    </select>
                                                                    </div>
                                                                
                                                                    <!-- footer modal -->
                                                                    <div class="modal-footer">
                                                                        <input type="submit" class="btn btn-primary pull-right mb-4" value="Simpan">
                                                                    </div>
                                                            </form>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                               <!-- =======================================
                                                    ========= Modal Rubah Status ==========
                                                    =======================================-->
                                                                                                    <!-- Modal Edit Data Kunjungan-->
                                                <div id="editModal{{$kunj->id}}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- konten modal-->
                                                        <div class="modal-content">
                                                            <!-- heading modal -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Kunjungan</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                            </div>
                                                            <!-- body modal -->
                                                            <form method="post" action="{{route('updateKunjungan')}}">
                                                                @csrf
                                                            <div class="modal-body">
                                                                <input name="id" type="hidden" value="{{$kunj->id}}"
                                                             <label for="nama_pic">Customer</label>
                                                             <!--<input value="{{$kunj->nama_perusahaan}}" name="customer" class="form-control" type="text"/>-->
                                                             <input value="{{$kunj->nama_perusahaan}}" name="customer" class="form-control" type="text" list="cust" />
                                                             <datalist id="cust">
                                                                @foreach ($customer as $cust)
                                                                <option value="{{$cust->nama_perusahaan}}">{{$cust->nama_perusahaan}}</option>
                                                                @endforeach
                                                             </datalist><br>

                                                             <label for="nama_pic">Nama PIC yang ditemui</label>
                                                             <input value="{{$kunj->nama_pic}}" name="namapic" type="text" class="form-control" id="nama_pic"><br>

                                                             <label for="contact_no_pic">Kontak PIC yang ditemui</label>
                                                             <input value="{{$kunj->contact_no_pic}}" name="kontakpic" type="number" class="form-control" id="contact_no_pic"><br>

                                                             <label for="produk">Produk yang akan dibeli</label>
                                                             <textarea name="produk"class="form-control" id="produk">{{$kunj->produk}}</textarea><br>

                                                             <label for="harga">Kisaran Harga</label>
                                                             <input value="{{$kunj->harga}}" name="kisaranharga" type="number" min="1" step="any" class="form-control" id="harga"><br>

                                                             <label for="waktu_pembelian">Perkiraan Waktu Pembelian</label>
                                                             <input value="{{$kunj->waktu_pembelian}}" name="waktu" class="form-control" type="date" value="" id="example-date-input"><br>

                                                             <label for="lainlain">Lain - Lain</label>
                                                             <textarea name="lainlain" type="text" class="form-control" id="lainlain">{{$kunj->lainlain}}</textarea><br>

                                                             <label for="foto">Foto saat kunjungan</label><br>
                                                             <?php $imageurl = str_replace('public/', '', $kunj->foto) ?>
                                                             <img src="{{url('storage/'.$imageurl)}}" alt="image" style="width:100%;">
<!--                                                             <input name="filefoto" type="file">-->
                                                         </div>
                                                         <!-- footer modal -->
                                                         <div class="modal-footer">
                                                             <input type="submit" class="btn btn-primary pull-right mb-4" value="Simpan">
                                                        </div>
                                                         </form>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                    
                                    @endforeach
                                    @endif


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