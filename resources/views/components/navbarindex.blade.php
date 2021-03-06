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
                <h3 class="welcome-sub-text">Selamat Datang Admin E-Kepegawaian </h3>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{ asset('template') }}/images/faces/face8.jpg"
                        alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="{{ asset('template') }}/images/faces/face8.jpg"
                            alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold">Dita Kominfo</p>
                        <p class="fw-light text-muted mb-0">lorepipsum@gmail.com</p>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <form action="admin/logout" method="POST">
                                    @csrf
                                    <button type="submit" style="margin-left: 25px;" class="btn btn-danger btn-sm"><span class="mdi mdi-logout">Logout</span></button>
                                </form>
                            </li>    
                        @endauth
                    </ul>    
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>