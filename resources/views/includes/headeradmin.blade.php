<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-2 col-12 p-0">
        <div class="container">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                </div>
                <img style="float:left width: 50%; height: 50%" src="../assets/images/econ.png"  alt="image" />
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar" >
        <div class="container">
            <ul class="nav page-navigation">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('targetAdmin')}}">
                        <i class="mdi mdi-target menu-icon"></i>
                        <span class="menu-title">Target Kunjungan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('kunjunganAdmin')}}">
                        <i class="mdi mdi-playlist-check menu-icon"></i>
                        <span class="menu-title">Kunjungan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('customer')}}">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">Customer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('useradmin')}}">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="nav-link d-flex">
                        <a href="{{route('dologout')}}" class="text-white"><i class="mdi mdi-logout"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>


