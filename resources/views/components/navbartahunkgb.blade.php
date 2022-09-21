<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="/">
                <img src="{{ asset('template') }}/images/kemkominfo.png" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="/">
                <img src="{{ asset('template') }}/images/kementrian.png" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">Admin</span></h1>
                <h3 class="welcome-sub-text">Silahkan Melakukan Pengelolaan Terhadap Data Kenaikan @yield('kenaikan')</h3>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown"
                href="{{url('admin/datakgb/2021/2025')}}" data-bs-toggle="dropdown" aria-expanded="false"> Pilih Rentang Tahun </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                    aria-labelledby="messageDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item" href="{{url('/admin/datakgb?startdate=2021-01-01&enddate=2025-12-31')}}">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">2021-2025</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item" href="{{url('/admin/datakgb?startdate=2026-01-01&enddate=2030-12-31')}}">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">2026-2030</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item" href="{{url('/admin/datakgb?startdate=2031-01-01&enddate=2035-12-31')}}">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">2031-2035</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item" href="{{url('/admin/datakgb?startdate=2036-01-01&enddate=2040-12-31')}}">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">2036-2040</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item" href="{{url('/admin/datakgb?startdate=2041-01-01&enddate=2045-12-31')}}">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">2041-2045</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item" href="{{url('/admin/datakgb?startdate=2046-01-01&enddate=2050-12-31')}}">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">2046-2050</p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <form class="search-form" method="GET" action="#">
                    <i class="icon-search"></i>
                    <input type="search" class="form-control" placeholder="Cari" title="Cari" name="cari">
                </form>
            </li>
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{ asset('template') }}/images/faces/face8.jpg"
                        alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle"
                            src="{{ asset('template') }}/images/faces/face8.jpg" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold">Dita Kominfo</p>
                        <p class="fw-light text-muted mb-0">lorepipsum@gmail.com</p>
                    </div>
                    <a class="dropdown-item"><i
                            class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>