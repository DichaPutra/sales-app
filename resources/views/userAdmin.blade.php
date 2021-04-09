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
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="../assets/css/demo_2/style.css" />
        <!-- End layout styles -->
        <link rel="shortcut icon" href="../assets/images/econ.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                                <h4 class="card-title">List User</h4>
                                <div>
                                    <button type="button" class="btn btn-primary pull-right mb-4" data-toggle="modal" data-target="#addUser">Tambah</button>
                                </div>
                                <!-- Modal Tambah User-->
                                <div id="addUser" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <form method="POST" action="{{route('adduser')}}">
                                            @csrf
                                            <!-- konten modal-->
                                            <div class="modal-content">
                                                <!-- heading modal -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add User</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- body modal -->
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input name="username" type="text" class="form-control" id="username" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input name="name" type="text" class="form-control" id="nama" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input name="email" type="text" class="form-control" id="password" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input name="password" type="text" class="form-control" id="password" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tipe User</label>
                                                        <select name="tipe" class="form-control">
                                                            <option value="admin">Admin</option>
                                                            <option value="atasan">Atasan</option>
                                                            <option value="sales">Sales</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- footer modal -->
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary pull-right mb-4" value="Tambah">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <br><br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="example" class="display responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th><center>No.</center></th>
                                        <th><center>Username</center></th>
                                        <th><center>Password</center></th>
                                        <th><center>Tipe User</center></th>
                                        <th><center>Action</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($datauser as $dat)
                                            <tr>
                                                <td><center>{{$no}}</center></td>
                                        <td>{{$dat->username}}</td>
                                        <td>{{$dat->password}}</td>
                                        <td>{{$dat->tipe}}</td>
                                        <td><div class="toolbox">
                                                <center><a style="color: blue;font-size:20px"><i class="mdi mdi-pencil" data-toggle="modal" data-target="#editUser{{$dat->id}}"></i></a>
                                                    &emsp;&emsp;
                                                    <a href="deleteuser/{{$dat->id}}" style="color: #cc0000;font-size:20px" onClick="confirm('Apakah anda yakin menghapus User ini ?')"><i class="mdi mdi-delete"></i></a></center>
                                            </div>
                                        </td>
                                        </tr>
                                        <?php $no++; ?>


                                        <!-- Modal edit User-->
                                        <div id="editUser{{$dat->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <form method="POST" action="{{route('edituser')}}">
                                                    @csrf
                                                    <!-- konten modal-->
                                                    <div class="modal-content">
                                                        <!-- heading modal -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Add User</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <!-- body modal -->
                                                        <input type="hidden" name="id" value="{{$dat->id}}">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input name="username" value="{{$dat->username}}" type="text" class="form-control" id="username" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input name="name" value="{{$dat->name}}"type="text" class="form-control" id="nama" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input name="email" value="{{$dat->email}}"type="text" class="form-control" id="password" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input name="password" value="{{$dat->password}}"type="text" class="form-control" id="password" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tipe User</label>
                                                                <select name="tipe" class="form-control">
                                                                    <option value="admin" @if ($dat->tipe == 'admin') selected @endif >Admin</option>
                                                                    <option value="atasan" @if ($dat->tipe == 'atasan') selected @endif >Atasan</option>
                                                                    <option value="sales" @if ($dat->tipe == 'sales') selected @endif>Sales</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- footer modal -->
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-primary pull-right mb-4" value="Update">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
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
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->

        <!--Script CSS-->
        <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
        <link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>
        <link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css' rel='stylesheet'>

        <!--Script untuk memanggil Javascript-->
        <table id="example" class="display responsive nowrap" style="width:100%">

            <!--Script Javascript-->
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
            <script type="text/javascript">
$(document).ready(function () {
    $('#example').DataTable({
        dom: 'Bfrtip',

        language: {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ baris",
            "zeroRecords": "Maaf - Data tidak ada",
            "info": "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data",
            "previous": "Prev",
            "infoFiltered": "(pencarian dari _MAX_ data)",

            // buttons: {
            //     colvis : "Show / Hide",
            //     colvisRestore: "Reset Kolom",
            // }
        },
        buttons: [
            // {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
        ],
    });
});
            </script>
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