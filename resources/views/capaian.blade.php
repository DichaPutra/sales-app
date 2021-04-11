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
                            <div class="card-body">
                                <h4 class="card-title">Nama Karyawan</h4>
                                <form class="forms-sample">
                                    <div class="container">
                                        <div class="panel-body">
                                            <form method="POST" action="{{route('capaianSelected')}}">
                                                <div class="form-group">
                                                    @csrf
                                                    <select name="id" class="selectpicker form-control" data-live-search="true" onchange='this.form.submit()'>
                                                        <option value="null">Pilih Sales ...</option>
                                                        @foreach ($user as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <h2 class="text-center"><?php echo $namasales; ?></h2>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="contact-detail" class="jw-table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="priority-5" width="10%"><span><b><center>No.</center></b></span></th>
                                                    <th scope="col" class="column-primary"><span><b><center>Keterangan</center></b></span></th>
                                                    <th scope="col" class="column-primary"><center><span><b><center>Action</center></b></span></center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach($datatabel as $dt)
                                                <tr>
                                                    <td class="priority-5"><center><?php echo "$no";
                                                $no++; ?></center></td>
                                            <td scope="row" class="title">
                                                @if($dt->nama_perusahaan == 'Tidak Melakukan Kunjungan')
                                                <div style="color: red;">{{$dt->nama_perusahaan}} | Alasan : {{$dt->alasan}}</div>
                                                @else
                                                {{$dt->nama_perusahaan}}
                                                @endif
                                            </td>
                                            <td scope="row">
                                                @if($dt->status == 'tercapai')
                                                <div>
                                                    <center><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalSaya{{$dt->id}}">Detail</button></center>
                                                </div> 
                                                @elseif($dt->status == 'tidak tercapai')
                                                <div class="toolbox">
                                                    <center>
                                                        <a href="{{url('disetujui/'.$dt->id)}}" style="color: green"><i class="mdi mdi-check"></i></a>
                                                        &emsp;
                                                        <a href="{{url('tidakDisetujui/'.$dt->id)}}" style="color: red"><i class="mdi mdi-close"></i></a>
                                                    </center>
                                                </div>
                                                @elseif($dt->status == 'disetujui')
                                                <div>
                                                    <center>Disetujui</center>
                                                </div> 
                                                @elseif($dt->status == 'ditak disetujui')
                                                <div>
                                                    <center>Tidak Disetujui</center>
                                                </div> 
                                                @endif

                                            </td>
                                            </tr>

                                            <!-- Modal Pop-Up -->
                                            <div class="modal fade" id="modalSaya{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalSayaLabel">{{$dt->nama_perusahaan}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="nama_pic">Nama PIC yang ditemui</label>
                                                                    <input type="text" class="form-control" id="nama_pic" value="{{$dt->nama_pic}}" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_pic">Kontak PIC yang ditemui</label>
                                                                    <input type="text" class="form-control" id="contact_no_pic" value="{{$dt->contact_no_pic}}" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="produk">Produk yang akan dibeli</label>
                                                                    <textarea class="form-control" id="produk" readonly>{{$dt->produk}}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga">Kisaran Harga</label>
                                                                    <input type="text" class="form-control" id="harga" value="{{$dt->harga}}" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="waktu_pembelian">Perkiraan Waktu Pembelian</label>
                                                                    <input type="text" class="form-control" id="waktu_pembelian" value="{{$dt->waktu_pembelian}}" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lainlain">Lain - Lain</label>
                                                                    <textarea type="text" class="form-control" id="lainlain" readonly>{{$dt->lainlain}}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                <?php $imageurl = str_replace('public/', '', $dt->foto) ?>
                                                                    <label for="foto">Foto saat kunjungan</label><br>
                                                                    <img src="{{url('storage/'.$imageurl)}}" alt="image" style="width:100%;">
                                                                    <!--<img id="foto" src="../assets/images/salesproject.jpg" alt="image" style="width:100%;" />-->
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
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
        </div>
        <!-- container-scroller -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('a.more').click(function () {

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