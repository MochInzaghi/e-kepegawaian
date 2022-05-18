@extends('layouts.indexlayout')
@section('title','E-Kepegawaian')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash" style="font-size:18px;">About Sistem Informasi E-Kepegawaian</h4>
                                                    </div>
                                                </div>
                                                <p style="margin-top:10px;font-size:20px;line-height:1;">E-Kepegawaian merupakan suatu sistem informasi yang memiliki fungsi utama yaitu membantu admin kepegawaian untuk mengelola data kepegawaian di kesekretariatan Dinas Komunikasi dan Informatika Kabupaten Malang. Sistem ini memiliki berbagai fitur yang menunjang pengelolaan data kepegawaian. Fitur-fitur yang tersedia yaitu Fitur Pengelolaan Data Pegawai, Fitur Pengelolaan Data Kenaikan Gaji Berkala, Fitur Pengelolaan Data Kenaikan Pangkat, Fitur Pengelolaan Data Penghargaan, Fitur Pengelolaan Data DUK (Daftar Urut Kepangkatan), Fitur Pengelolaan Data Pensiun, dan Fitur Pengelolaan Data Cuti.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-white mb-4">Jumlah Data Pegawai</h4>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <p class="status-summary-ight-white mb-1">Pegawai Dinas</p>
                                                        <h2 class="text-info">32</h2>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="status-summary-chart-wrapper pb-4">
                                                            <canvas id="status-summary-pegawai-dinas"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-white mb-4">Jumlah Data Pegawai</h4>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <p class="status-summary-ight-white mb-1">Pegawai Honorer</p>
                                                        <h2 class="text-info">50</h2>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="status-summary-chart-wrapper pb-4">
                                                            <canvas id="status-summary-pegawai-honorer"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between align-items-center m-0">
                            <div class="bg-white rounded d-flex justify-content-center align-items-center mb-3 pt-3 px-4" style="font-size: 0.6rem; width: 10rem;">
                                <div class="text-center">
                                    <div class="fw-bold fntsz">Fitur Pengelolaan <br>Data Pegawai</div>
                                    <div class="text-break mt-2 fontsize">admin dapat melakukan<br>pengelolaan berupa tambah,<br>edit, dan hapus data pegawai</div>
                                    <div class="d-flex justify-content-center mgtop">
                                        <form method="get" action="{{route('admin.pegawai')}}">
                                            <button type="submit" class="mt-3 btn btn-primary text-white rounded bottom-auto">Kelola<i style="font-size:15px; margin-left:5px;" class="fa fa-arrow-right"></i></button>
                                        </form>    
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded d-flex justify-content-center align-items-center mb-3 pt-3 px-4" style="font-size: 0.6rem; width: 10rem;">
                                <div class="text-center">
                                    <div class="fw-bold fntsz">Fitur Pengelolaan <br>Data KGB</div>
                                    <div class="text-break mt-2 fontsize">admin dapat melakukan<br>pengelolaan berupa edit dan<br>print laporan setiap kenaikan gaji<br>per karyawan</div>
                                    <div class="d-flex justify-content-center">
                                        <form method="get" action="{{route('admin.kgb')}}">
                                            <button type="submit" class="mt-3 btn btn-primary text-white rounded bottom-auto">Kelola<i style="font-size:15px; margin-left:5px;" class="fa fa-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded d-flex justify-content-center align-items-center mb-3 pt-3 px-4" style="font-size: 0.6rem; width: 10rem;">
                                <div class="text-center">
                                    <div class="fw-bold fntsz">Fitur Pengelolaan <br>Data KP</div>
                                    <div class="text-break mt-2 fontsize">admin dapat melakukan<br>pengelolaan berupa edit dan<br>print laporan setiap kenaikan<br>pangkat per karyawan</div>
                                    <div class="d-flex justify-content-center">
                                        <form method="get" action="{{route('admin.kp')}}">
                                            <button type="submit" class="mt-3 btn btn-primary text-white rounded bottom-auto">Kelola<i style="font-size:15px; margin-left:5px;" class="fa fa-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded d-flex justify-content-center align-items-center mb-3 pt-3 px-4" style="font-size: 0.6rem; width: 10rem;">
                                <div class="text-center">
                                    <div class="fw-bold fntsz">Fitur Pengelolaan <br>Data Penghargaan</div>
                                    <div class="text-break mt-2 fontsize">admin dapat melakukan<br>pengelolaan berupa edit dan<br>print laporan setiap bulan</div>
                                    <div class="d-flex justify-content-center mgtop">
                                        <form method="get" action="{{route('admin.penghargaan')}}">
                                            <button type="submit" class="mt-3 btn btn-primary text-white rounded bottom-auto">Kelola<i style="font-size:15px; margin-left:5px;" class="fa fa-arrow-right"></i></button>
                                        </form>    
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded d-flex justify-content-center align-items-center mb-3 pt-3 px-4" style="font-size: 0.6rem; width: 10rem;">
                                <div class="text-center">
                                    <div class="fw-bold fntsz">Fitur Pengelolaan <br>Data DUK</div>
                                    <div class="text-break mt-2 fontsize">admin dapat melakukan<br>pengelolaan berupa edit dan <br>print laporan setiap bulan</div>
                                    <div class="d-flex justify-content-center mgtop">
                                        <form method="get" action="{{route('admin.duk')}}">
                                            <button type="submit" class="mt-3 btn btn-primary text-white rounded bottom-auto">Kelola<i style="font-size:15px; margin-left:5px;" class="fa fa-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded d-flex justify-content-center align-items-center mb-3 pt-3 px-4" style="font-size: 0.6rem; width: 10rem;">
                                <div class="text-center">
                                    <div class="fw-bold fntsz">Fitur Pengelolaan <br>Data Pensiun</div>
                                    <div class="text-break mt-2 fontsize">admin dapat melakukan<br>pengelolaan berupa edit dan<br>print laporan setiap bulan</div>
                                    <div class="d-flex justify-content-center mgtop">
                                        <form method="get" action="{{route('admin.pensiun')}}">
                                            <button type="submit" class="mt-3 btn btn-primary text-white rounded bottom-auto">Kelola<i style="font-size:15px; margin-left:5px;" class="fa fa-arrow-right"></i></button>
                                        </form>    
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded d-flex justify-content-center align-items-center mb-3 pt-3 px-4" style="font-size: 0.6rem; width: 10rem;">
                                <div class="text-center">
                                    <div class="fw-bold fntsz">Fitur Pengelolaan <br>Data Cuti</div>
                                    <div class="text-break mt-2 fontsize">admin dapat melakukan<br>pengelolaan berupa tambah,<br>edit, hapus, dan print laporan <br>data pegawai setiap bulan</div>
                                    <div class="d-flex justify-content-center">
                                        <form method="get" action="{{route('admin.cuti')}}">
                                            <button type="submit" class="mt-3 btn btn-primary text-white rounded bottom-auto">Kelola<i style="font-size:15px; margin-left:5px;" class="fa fa-arrow-right"></i></button>
                                        </form>    
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
@endsection