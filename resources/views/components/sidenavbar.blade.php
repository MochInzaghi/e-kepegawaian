<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
    <li class="nav-item nav-category">Forms and Menu</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Form</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('create.pegawai')}}">Form Data Pegawai</a></li>
                </ul>
            </div>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('create.cuti')}}">Form Data Cuti</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="menu-icon mdi mdi-menu"></i>
                <span class="menu-title">Menu</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.pegawai')}}">Kelola Data Pegawai</a></li>
                </ul>
            </div>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('/admin/datakgb?startdate=2021-01-01&enddate=2025-12-31')}}">Kelola Data KGB</a></li>
                </ul>
            </div>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('/admin/datakp?startdate=2021-01-01&enddate=2025-12-31')}}">Kelola Data KP</a></li>
                </ul>
            </div>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.penghargaan')}}">Kelola Data Penghargaan</a></li>
                </ul>
            </div>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.duk')}}">Kelola Data DUK</a></li>
                </ul>
            </div>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.pensiun')}}">Kelola Data Pensiun</a></li>
                </ul>
            </div>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.cuti')}}">Kelola Data Cuti</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>