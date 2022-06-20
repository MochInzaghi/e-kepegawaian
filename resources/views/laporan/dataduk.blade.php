<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cetak Laporan Data DUK</title>

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
            width: 300px;
            height: 200px;
            float: left;
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
                                <img src="{{ asset('image') }}/Malang.png"class="logomalang">
                            </center>
                            <center>
                                <img src="{{ asset('template') }}/images/kementrian.png" class="logokominfo">
                            </center>
                            <div class="col-md-12 text-center">
                                <h4>PEMERINTAH KABUPATEN MALANG</h3>
                                <h3>DINAS KOMUNIKASI DAN INFORMATIKA</h3>
                                <h2>SEKRETARIAT DISKOMINFO KABUPATEN MALANG</h3>
                                <h3>Jl. Jend. Ahmad Yani Utara No. 348B</h3>
                                <h3>Telp. (0341) 404412 Fax. (0341) 404413</h3>
                            </div>
                        </div>
                        <span>
                            <hr class="line-title">
                        </span>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <h3>LAPORAN DATA DAFTAR URUT KEPANGKATAN PEGAWAI</h3>
                        <h3>Bulan {{  $bulan  }}  Tahun {{ $tahun }} </h3>
                    </div>

                        <table class="table table-bordered solid" style="margin-top: 10px; border:1px solid black;">
                            <tr>
                                <th>
                                    No
                                  </th>
                                  <th>
                                    Nama Pegawai
                                  </th>
                                  <th>
                                    NIP
                                  </th>
                                  <th>
                                    Tempat Tanggal Lahir
                                  </th>
                                  <th>
                                    Pangkat / <br>Gol. Ruang
                                  </th>
                                  <th>
                                    TMT / <br>Gol. Ruang
                                  </th>
                                  <th>
                                    Jabatan Terakhir
                                  </th>
                                  <th>
                                    Masa Kerja <br>(Tahun)
                                  </th>
                                  <th>
                                    Masa Kerja <br>(Bulan)
                                  </th>
                                  <th>
                                    Pendidikan <br>Kepemimpinan
                                  </th>
                                  <th>
                                    Tahun <br>Lulus
                                  </th>
                                  <th>
                                    Pendidikan Terakhir, <br> Nama Sekolah
                                  </th>
                                  <th>
                                    Tahun <br>Lulus
                                  </th>
                                  <th>
                                    Jenis <br>Kelamin
                                  </th>
                                  <th>
                                    Agama <br>Tahun
                                  </th>
                                  <th>
                                    Tahun <br>Pensiun
                                  </th>
                                  <th>
                                    Keterangan
                                  </th>
                            </tr>

                            @php $no=1; @endphp
                            @foreach ($data_duk as $duk)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $duk->namapegawai }}</td>
                                    <td>{{ $duk->nip }}</td>
                                    <td>{{ $duk->ttl }}</td>
                                    <td>{{ $duk->pangkat }}</td>
                                    <td>{{ $duk->pegawaiDuk->tmt ?? ''}}</td> 
                                    <td>{{ $duk->pegawaiDuk->jabatanterakhir ?? '' }}</td>
                                    <td>{{ $duk->pegawaiDuk->mk_tahun ?? '' }}</td>
                                    <td>{{ $duk->pegawaiDuk->mk_bulan ?? ''}}</td>
                                    <td>{{ $duk->pegawaiDuk->pendidikan_kepemimpinan ?? ''}}</td>
                                    <td>{{ $duk->pegawaiDuk->tahunlulus ?? ''}}</td>
                                    <td>{{ $duk->pegawaiDuk->pendidikan_terakhir ?? ''}}</td>
                                    <td>{{ $duk->pegawaiDuk->tahun_lulus ?? ''}}</td>
                                    <td>{{ $duk->pegawaiDuk->jeniskelamin ?? ''}}</td> 
                                    <td>{{ $duk->pegawaiDuk->agama_tahun ?? ''}}</td>
                                    <td>{{ $duk->pegawaiDuk->tahunpensiun ?? ''}}</td>
                                    <td>{{ $duk->pegawaiDuk->keterangan_duk ?? ''}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>