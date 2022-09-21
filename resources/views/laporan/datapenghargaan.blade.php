<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cetak Laporan Data Penghargaan</title>

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
            .posisikop{
                 padding-top: 25px;
                 padding-right: 150px;
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
                                <h3>LAPORAN DATA PENGHARGAAN PEGAWAI</h3>
                                <h3>Bulan {{  $bulan  }}  Tahun {{ $tahun }} </h3>
                            </div>
                        <table class="table table-bordered solid" style="margin-top: 10px; border:1px solid black;">
                            <tr>
                                <th class="thratatengah">
                                No
                                </th>
                                <th class="thratatengah">
                                Nama Pegawai
                                </th>
                                <th class="thratatengah">
                                NIP
                                </th>
                                <th class="thratatengah">
                                Gelar Tanda Kehormatan<br>10 Tahun
                                </th>
                                <th class="thratatengah">
                                Gelar Tanda Kehormatan<br>20 Tahun
                                </th>
                                <th class="thratatengah">
                                Gelar Tanda Kehormatan<br>30 Tahun
                                </th>
                            </tr>

                            @php $no=1; @endphp
                             @foreach ($datapegawai as $data)
                             @php
                                $penghargaan = $data_penghargaan[$no-1];
                                $bulan10 = $datebulan[(int)date('n', strtotime($penghargaan->thn_10 ?? ''))-1];
                                $date10 = date('j', strtotime($penghargaan->thn_10 ?? '')). " " . $bulan10 . " " . date('Y', strtotime($penghargaan->thn_10 ?? ''));
                                $bulan20 = $datebulan[(int)date('n', strtotime($penghargaan->thn_20 ?? ''))-1];
                                $date20 = date('j', strtotime($penghargaan->thn_20 ?? '')). " " . $bulan20 . " " . date('Y', strtotime($penghargaan->thn_20 ?? ''));
                                $bulan30 = $datebulan[(int)date('n', strtotime($penghargaan->thn_30 ?? ''))-1];
                                $date30 = date('j', strtotime($penghargaan->thn_30 ?? '')). " " . $bulan30 . " " . date('Y', strtotime($penghargaan->thn_30 ?? ''));
                            @endphp
                                <tr>
                                    <td class="thratatengah">{{ $no++ }}</td>
                                        <td>{{  $data->namapegawai ?? '' }}</td>
                                        <td class="thratatengah">{{ $data->nip ?? '' }}</td>
                                        @if(empty($penghargaan->thn_10) and empty($penghargaan->thn_20) and empty($penghargaan->thn_30) )
                                        <td class = "thratatengah">{{ $penghargaan->thn_10 ?? '' }}</td>
                                        <td class = "thratatengah">{{ $penghargaan->thn_20 ?? '' }}</td>
                                        <td class = "thratatengah">{{ $penghargaan->thn_30 ?? '' }}</td>
                                        @elseif(empty($penghargaan->thn_20) and empty($penghargaan->thn_30))
                                        <td class = "thratatengah">{{ $date10 ?? '' }}</td>
                                        <td class = "thratatengah">{{ $penghargaan->thn_20 ?? '' }}</td>
                                        <td class = "thratatengah">{{ $penghargaan->thn_30 ?? '' }}</td>
                                        @elseif(empty($penghargaan->thn_30))
                                        <td class = "thratatengah">{{ $date10 }}</td>
                                        <td class = "thratatengah">{{ $date20 }}</td>
                                        <td class = "thratatengah">{{ $penghargaan->thn_30 ?? '' }}</td>
                                        @else
                                        <td class = "thratatengah">{{ $date10 }}</td>
                                        <td class = "thratatengah">{{ $date20 }}</td>
                                        <td class = "thratatengah">{{ $date30 }}</td>
                                        @endif 
                                </tr>
                                @endforeach 
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>