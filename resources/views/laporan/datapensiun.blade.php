<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cetak Laporan Data Pensiun</title>

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
                            <h3>LAPORAN DATA PENSIUN PEGAWAI</h3>
                            <h3>Bulan {{  $bulan  }}  Tahun {{ $tahun }} </h3>
                        </div>
                    <table class="table table-bordered solid" style="margin-top: 10px; border:1px solid black;">
                            <tr>
                                <th class="thratakiri">
                                    No
                                  </th>
                                  <th class="thratakiri">
                                    Nama Pegawai
                                  </th>
                                  <th class="thratakiri">
                                    NIP
                                  </th>
                                  <th class="thratakiri">
                                    Pangkat / Gol. Ruang
                                  </th>
                                  <th class="thratakiri">
                                    Tanggal Lahir Pada <br> SK Pengangkatan <br> Pertama
                                  </th>
                                  <th class="thratakiri">
                                    58 Tahun Yang <br> Akan Datang <br> Pada (TMT)
                                  </th>
                                  <th class="thratakiri">
                                    60 Tahun Yang <br> Akan Datang <br> Pada (TMT)
                                  </th>
                                  <th class="thratakiri">
                                    Tanggal
                                  </th>
                                  <th class="thratakiri">
                                    No. SK
                                  </th>
                                  <th class="thratakiri">
                                    Keterangan
                                  </th>
                            </tr>

                            @php $no=1; @endphp
                            @foreach ($data_pensiun as $pensiun)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pensiun->namapegawai }}</td>
                                    <td>{{ $pensiun->nip }}</td>
                                    <td>{{ $pensiun->pangkat }}</td>
                                    <td>{{ $pensiun->pegawaiPensiun->tl_sk_pertama ?? '' }}</td> 
                                    <td>{{ $pensiun->pegawaiPensiun->tmt_58 ?? '' }}</td>
                                    <td>{{ $pensiun->pegawaiPensiun->tmt_60 ?? '' }}</td>
                                    <td>{{  date('d F Y', strtotime($pensiun->pegawaiPensiun->tanggal ?? '')) }}</td>
                                    <td>{{ $pensiun->pegawaiPensiun->no_sk ?? '' }}</td>
                                    <td>{{ $pensiun->pegawaiPensiun->keterangan_pensiun ?? '' }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>