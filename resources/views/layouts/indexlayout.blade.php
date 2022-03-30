<!DOCTYPE html>
<html lang="en">

@include('components.headindex')

<body>
    <div class="container-scroller">
        @include('components.navbarindex')
        <div class="container-fluid page-body-wrapper">
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                    <div id="theme-settings" class="settings-panel">
                            <i class="settings-close ti-close"></i>
                            <p class="settings-heading">SIDEBAR SKINS</p>
                        <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
                            <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
                                <p class="settings-heading mt-2">HEADER SKINS</p>
                        <div class="color-tiles mx-0 px-4">
                            <div class="tiles success"></div>
                            <div class="tiles warning"></div>
                            <div class="tiles danger"></div>
                            <div class="tiles info"></div>
                            <div class="tiles dark"></div>
                            <div class="tiles default"></div>
                        </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
            </div>

            @include('components.sidenavbar')

            <div class="main-panel">
                @yield('content')

                @include('components.footer')
            </div>
        </div>
    </div>

    <script src="{{asset('template')}}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{asset('template')}}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{asset('template')}}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('template')}}/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset('template')}}/js/off-canvas.js"></script>
    <script src="{{asset('template')}}/js/hoverable-collapse.js"></script>
    <script src="{{asset('template')}}/js/template.js"></script>
    <script src="{{asset('template')}}/js/settings.js"></script>
    <script src="{{asset('template')}}/js/todolist.js"></script>
    <script src="{{asset('template')}}/js/dashboard.js"></script>
    <script src="{{asset('template')}}/js/Chart.roundedBarCharts.js"></script>
</body>

</html>
