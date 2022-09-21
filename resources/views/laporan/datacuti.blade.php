<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cetak Laporan Data Cuti</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJISAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('template') }}/vendors/feather/feather.css">
        <link rel="stylesheet" href="{{ asset('template') }}/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="{{ asset('template') }}/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="{{ asset('template') }}/vendors/typicons/typicons.css">
        <link rel="stylesheet" href="{{ asset('template') }}/vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="{{ asset('template') }}/vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="{{ asset('template') }}/css/vertical-layout-light/style.css">
        <link rel="shortcut icon" href="{{ asset('template') }}/images/kementrian.png" />

    </head>

    <body style="background-color: white;" onload="window.print()">

        <style>
            .line-title{
                border: 0;
                border-style: inset;
                border-top: 5px solid black;
            }
            .logomalang{
                width: 160px;
                height: 200px;
                float: left;
                margin-left: 100px;
            }
            .posisikop{
                 padding-top: 25px;
                 padding-right: 150px;
                 padding-left: 60px;
             }
            .logokominfo{
                width: 180px;
                height: 160px;
                float: right;
                margin-right: 30px;
                margin-top: 20px;
            }
            h4{
                text-align: center;
                text-transform: uppercase;
                font-weight: bold;
                font-family: "Times New Roman";
            }
            h3{
                text-align: center;
                text-transform: uppercase;
                font-weight: bold;
                font-family: "Times New Roman";
            }
            h2{
                text-align: center;
                text-transform: uppercase;
                font-weight: bold;
                font-family: "Times New Roman";
            }
        </style>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <img src="{{ asset('image') }}/download.png"class="logomalang">
                                </center>
                                <div class="col-md-12 text-center posisikop">
                                    <h3>PEMERINTAH KABUPATEN MALANG</h3>
                                    <h2>DINAS KOMUNIKASI DAN INFORMATIKA</h2>
                                    <h5>Jalan A. Yani Utara No. 384  Telp./ Fax (0341) 408788</h5>
                                    <h5>Website : www.kominfo.malangkab.go.id Email: kominfo@malangkab.go.id</h5>
                                    <h3 style="text-decoration: underline;">M A L A N G &nbsp; 6 5 1 2 6</h3>
                                </div>
                            </div>
                            <span>
                                <hr class="line-title">
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>LAPORAN DATA CUTI PEGAWAI</h3>
                                <h3>Bulan {{  $bulan  }}  Tahun {{ $tahun }} </h3>
                            </div>
                        <table class="table table-bordered solid" style="margin-top: 10px; border:1px solid black;">
                            <tr>
                                <th class = "thratatengah">
                                  No
                                </th>
                                <th class = "thratatengah">
                                  Nama Pegawai
                                </th>
                                <th class = "thratatengah">
                                  NIP
                                </th>
                                <th class = "thratatengah">
                                  Jabatan
                                </th>
                                <th class = "thratatengah">
                                  Jenis Cuti
                                </th>
                                <th class = "thratatengah">
                                  Dari Tanggal
                                </th>
                                <th class = "thratatengah">
                                  Sampai Tanggal
                                </th>
                                <th class = "thratatengah">
                                  Jumlah <br>Hari Kerja
                                </th>
                                <th class = "thratatengah">
                                  Sisa Cuti <br>Tahunan YBS
                                </th>
                                <th class = "thratatengah">
                                  Pejabat
                                </th>
                                <th class = "thratatengah">
                                  No. Surat
                                </th>
                                <th class = "thratatengah">
                                  Tanggal
                                </th>
                                <th class = "thratatengah">
                                  Keterangan
                                </th>
                                <th class = "thratatengah">
                                  Aksi
                                </th>
                              </tr>

                            @php $no=1; @endphp
                            @foreach ($data_cuti as $cuti)
                            @php
                                $bulandrtgl = $datebulan[(int)date('n', strtotime($cuti->daritgl))-1];
                                $daritgl = date('j', strtotime($cuti->daritgl)). " " . $bulandrtgl . " " . date('Y', strtotime($cuti->daritgl));
                                $bulansmptgl = $datebulan[(int)date('n', strtotime($cuti->sampaitgl))-1];
                                $sampaitgl = date('j', strtotime($cuti->sampaitgl)). " " . $bulansmptgl . " " . date('Y', strtotime($cuti->sampaitgl));
                                $bulantgl = $datebulan[(int)date('n', strtotime($cuti->tanggal))-1];
                                $tanggal = date('j', strtotime($cuti->tanggal)). " " . $bulantgl . " " . date('Y', strtotime($cuti->tanggal));
                            @endphp
                                <tr>
                                <th class = "thratatengah" scope="row">{{ $cuti->id }}</th>
                                <td>{{$cuti->namapegawai}}</td>
                                <td class = "thratatengah">{{$cuti->nip}}</td>
                                <td class = "thratatengah">{{$cuti->jabatan}}</td>
                                <td class = "thratatengah">{{$cuti->jeniscuti}}</td>
                                <td class = "thratatengah">{{ $daritgl }}</td> 
                                <td class = "thratatengah">{{ $sampaitgl }}</td>
                                <td class = "thratatengah">{{$cuti->jmlhrkrj}}</td>
                                <td class = "thratatengah">{{$cuti->sisacuti}}</td>
                                <td class = "thratatengah">{{$cuti->pejabat}}</td>
                                <td class = "thratatengah">{{$cuti->nosurat}}</td>
                                <td class = "thratatengah">{{ $tanggal }}</td>
                                <td class = "thratatengah">{{$cuti->keterangan}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>