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
                border-top: 1px solid #000;
            }
        </style>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table style="width: 100%;">
                            <tr>
                               <td align="center">
                                    <span style="line-height: 1.6; font-weight: bold;">
                                        LAPORAN DATA CUTI PEGAWAI
                                        <br>Dinas Komunikasi dan Informatika Kabupaten Malang
                                    </span>
                               </td> 
                            </tr>
                        </table>

                        <hr>
                            <p align="center">
                                LAPORAN DATA CUTI PEGAWAI
                            </p>
                        <hr/>

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Jenis Cuti</th>
                                <th>Dari Tanggal</th>
                                <th>Sampai Tanggal</th>
                                <th>Jumlah Hari Kerja</th>
                                <th>Sisa Cuti Tahunan YBS</th>
                                <th>Pejabat</th>
                                <th>No. Surat</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                            </tr>

                            @php $no=1; @endphp
                            @foreach ($data_cuti as $cuti)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$cuti->namapegawai}}</td>
                                    <td>{{$cuti->nip}}</td>
                                    <td>{{$cuti->jabatan}}</td>
                                    <td>{{$cuti->jeniscuti}}</td>
                                    <td>{{$cuti->daritgl}}</td> 
                                    <td>{{$cuti->sampaitgl}}</td>
                                    <td>{{$cuti->jmlhrkrj}}</td>
                                    <td>{{$cuti->sisacuti}}</td>
                                    <td>{{$cuti->pejabat}}</td>
                                    <td>{{$cuti->nosurat}}</td>
                                    <td>{{$cuti->tanggal}}</td>
                                    <td>{{$cuti->keterangan}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>