<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="/">
          <img src="{{asset('template')}}/images/kemkominfo.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="/">
          <img src="{{asset('template')}}/images/kementrian.png" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top"> 
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">Admin</span></h1>
          <h3 class="welcome-sub-text">Silahkan Melakukan Pengelolaan Terhadap Data @yield('tabel')</h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown d-none d-lg-block">
         <form action="{{route('print.duk')}}" method="GET"> 
          <div class="form-group">
            <select class="optionstyle form-select" name="tahun">
                <option selected>Pilih Tahun</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            </select>
          </div>
        </li>
        <li class="nav-item dropdown d-none d-lg-block">
          <div class="form-group">
            <select class="optionstyle form-select" name="bulan">
                <option selected>Pilih Bulan</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
          </div>
        </li>
        <li class="nav-item d-none d-lg-block">
          <div class="btn-wrapper">
            <button type="submit" target="_blank" class="btn btn-primary btn-sm text-white me-0 btn-"><i class="icon-printer"></i> Print</a>
          </div>
        </li>
      </form>
        <li class="nav-item">
          <form class="search-form" method="GET" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Cari" title="Cari" name="cari">
          </form>
        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="{{asset('template')}}/images/faces/face8.jpg" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="{{asset('template')}}/images/faces/face8.jpg" alt="Profile image">
              <p class="mb-1 mt-3 font-weight-semibold">Dita Kominfo</p>
              <p class="fw-light text-muted mb-0">lorepipsum@gmail.com</p>
            </div>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>