<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Cetak Laporan Data KP</title>

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
             .logomalang{
                width: 160px;
                height: 200px;
                float: left;
                margin-left: 100px;
            }
             h3{
                text-align: center;
                text-transform: uppercase;
                font-family: "Arial";
             }
             h2{
                text-align: center;
                text-transform: uppercase;
                font-weight: bold;
                font-family: "Arial";
             }
             .posisikop{
                 padding-top: 25px;
                 padding-right: 150px;
             }
             .posisiperihal1{
                 padding-left: 100px;
                 padding-top: 40px;
             }
             .posisiperihal2{
                 padding-left: 130px;
             }
             .posisiperihal3{
                 padding-left: 100px;
                 padding-top: 205px;
             }
             .p1{
                 font-family: "Arial";
                 font-size: 20px;
                 word-spacing: 10px;
             }
             .p2{
                font-family: "Arial";
                font-size: 20px;
             }
             .p3{
                font-family: "Arial";
                font-size: 20px;
             }
             .p4{
                 font-family: "Arial";
                 font-size: 20px;
             }
             .paragraf1{
                 padding-top: 50px;
                 padding-left: 140px;
             }
            .paragraf2{
                 padding-left: 200px;
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
                        </div>
                        <div class="row">
                            <div class="col-8 col-sm-6 posisiperihal1">
                                <p class="p1">Nomor    : -</p>
                                <p class="p1">Sifat    : -</p>
                                <p class="p1">Lampiran : -</p>
                                <p class="p1">Perihal  : <strong>KENAIKAN PANGKAT</strong></p>
                            </div>
                            <div class="col-4 col-sm-6 posisiperihal2">
                                <p class="p2">Malang,  Februari 2021</p>
                                <p class="p2">Kepada : </p>
                                <p class="p2">-</p>
                                <p class="p2">di-</p>
                                <p class="p2" style="padding-left: 90px"><strong>M&nbsp;A&nbsp;L&nbsp;A&nbsp;N&nbsp;G</strong></p>
                            </div>
                            <div class="col-md-12 paragraf1">
                                <p class="p1" style="text-indent: 5em;">Kepala Dinas Komunikasi dan Informatika Kabupaten Malang dengan ini <br>memberitahukan bahwa berhubung dengan telah dipenuhinya masa kerja dan syarat – syarat :</p>
                            </div>
                            <div class="container-fluid" style="margin-left: 170px;">
                                <table style="border-color: #FFFFFF">
                                    <tbody>
                                        <tr class="d-flex">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">1.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">Nama</td>
                                            <td style="margin-left: 90px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datapegawai->namapegawai  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">2.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">NIP</td>
                                            <td style="margin-left: 110px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datapegawai->nip  }}</td>
                                        </tr>
                                        {{-- <tr class="d-flex">
                                            <td class="font" scope="row">3.</td>
                                            <td class="font" style="text-align: left">Tgl. Lahir</td>
                                            <td class="font" style="margin-left: 145px;">:</td>
                                            <td class="font" style="text-align: left">{{  $datakgb->tgl_lahir  }}</td>
                                        </tr> --}}
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">3.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">Pangkat / Gol</td>
                                            <td style="margin-left: 23px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datapegawai->pangkat  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">5.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">Jabatan</td>
                                            <td style="margin-left: 72px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datapegawai->jabatan  }}</td>
                                        </tr>
                                        {{-- <tr class="d-flex">
                                            <td class="font" scope="row">6.</td>
                                            <td class="font" style="text-align: left">Kantor / Tempat</td>
                                            <td class="font" style="margin-left: 101px;">:</td>
                                            <td class="font" style="text-align: left">Dinas Komunikasi dan Informatika Kabupaten Malang</td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="font" scope="row">7.</td>
                                            <td class="font" style="text-align: left">Gaji Pokok Lama</td>
                                            <td class="font" style="margin-left: 101px;">:</td>
                                            <td class="font" style="text-align: left">Rp. {{  $datakgb->getPegawai->gajipokok  }},-</td>
                                        </tr> --}}
                                        {{-- <tr class="d-flex">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">Atas dasar Surat Keputusan terakhir tentang gaji/pangkat yang ditetapkan : <b>PP Nomor 12 Tahun 2002</b></td>
                                        </tr> --}}
                                        <tr class="d-flex" style="margin-top: 10px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">Telah Menyetorkan Persayaratan :</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">1.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC SK Pengangkatan dalam Jabatan Struktural</td>
                                            <td style="margin-left: 380px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datakp->skp_struktural  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">2.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC Surat Pernyataan Melaksanakan Tugas</td>
                                            <td style="margin-left: 420px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{ $datakp->sp_tugas  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">3.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC Surat Pernyataan Pelantikan </td>
                                            <td style="margin-left: 515px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datakp->sp_pelantikan  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">4.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC Berita Acara Pengangkatan Sumpah</td>
                                            <td style="margin-left: 445px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datakp->ba_pengangkatansumpah  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">5.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC Ijazah Terakhir Legalisir</td>
                                            <td style="margin-left: 560px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{   $datakp->ijazah_terakhir  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">6.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC Surat Tanda Lulus Diklatpim Tingkat III atau STLUD Tingkat II atau memiliki ijazah S-2</td>
                                            <td style="margin-left: 10px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datakp->surat_tandalulus  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">7.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC SKP Tahun 2020</td>
                                            <td style="margin-left: 620px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datakp->skp_2020  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">8.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC SKP Tahun 2021 </td>
                                            <td style="margin-left: 620px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datakp->skp_2021  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">9.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC SKP Jabatan </td>
                                            <td style="margin-left: 652px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datakp->skp_jabatan  }}</td>
                                        </tr>
                                        <tr class="d-flex" style="margin-top: 5px;">
                                            <td style="font-size: 20px; font-family: Arial" scope="row">10.</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">FC Surat Pernyataan Pengangkatan yang lama </td>
                                            <td style="margin-left: 370px; font-size: 20px; font-family: Arial">:</td>
                                            <td style="text-align: left; font-size: 20px; font-family: Arial">{{  $datakp->sp_pengangkatanlama   }}</td>
                                        </tr>
                                        {{-- <tr class="d-flex">
                                            <td class="font" scope="row">a.</td>
                                            <td class="font" style="text-align: left">Oleh Pejabat</td>
                                            <td class="font" style="margin-left: 119px;">:</td>
                                            <td class="font" style="text-align: left">Plt. Kepala Dinas Komunikasi dan Informatika</td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="font" scope="row">b.</td>
                                            <td class="font" style="text-align: left">Tanggal<br>Nomor</td>
                                            <td class="font" style="margin-left: 147px;">:<br>:</td>
                                            <td class="font" style="text-align: left">{{  $datakgb->tanggal  }}<br>822.1/385/35.07.127/2019</td>                                            </td>
                                        </tr>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="font" scope="row">c.</td>
                                            <td class="font" style="text-align: left">Tanggal mulai berlakunya<br>Gaji tersebut</td>
                                            <td class="font" style="margin-left: 45px;"><br>:</td>
                                            <td class="font" style="text-align: left"><br>{{  $datakgb->tgl_gaji  }}</td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="font" scope="row">d.</td>
                                            <td class="font" style="text-align: left">Masa Kerja Golongan<br>Pada tanggal  tersebut</td>
                                            <td class="font" style="margin-left: 65px;"><br>:</td>
                                            <td class="font" style="text-align: left"><br>{{  $datakgb->masakerja_tgl  }}</td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="font" scope="row">Diberikan Kenaikan gaji berkala hingga memperoleh : <b>PP Nomor 15 Tahun 2015</b></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="font" scope="row">8.</td>
                                            <td class="font" style="text-align: left"><b>Gaji Pokok Baru</b></td>
                                            <td class="font" style="margin-left: 99px;">:</td>
                                            <td class="font" style="text-align: left"><b>Rp. {{  $datakgb->gajibaru  }},-</b></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="font" scope="row">9.</td>
                                            <td class="font" style="text-align: left">Berdasarkan Masa Kerja</td>
                                            <td class="font" style="margin-left: 55px;">:</td>
                                            <td class="font" style="text-align: left">{{  $datakgb->masakerja  }}
                                                </td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="font" scope="row">10.</td>
                                            <td class="font" style="text-align: left">Dalam Golongan Ruang</td>
                                            <td class="font" style="margin-left: 53px;">:</td>
                                            <td class="font" style="text-align: left">{{  $datakgb->gol_ruang  }}</td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="font" scope="row">11.</td>
                                            <td class="font" style="text-align: left">Mulai Tanggalr</td>
                                            <td class="font" style="margin-left: 108px;">:</td>
                                            <td class="font" style="text-align: left">{{  $datakgb->mulai_tgl  }}</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="col-md-12 paragraf1">
                                <p class="p1" style="text-indent: 5em;">Diharapkan agar sesuai dengan <u>Peraturan Pemerintah Repubik Indonesia Nomor 15 Tahun 2019</u> kepada Pegawai tersebut dapat dibayarkan penghasilanya berdasarkan gaji pokok <br>yang baru.</p>
                            </div> --}}
                            {{-- <div class="col-8 col-sm-6 posisiperihal3">
                                <p class="p4">Tembusan surat ini disampaikan kepada Yth. :</p>
                                <p class="p4" style="padding-left: 60px;">1. Sdr. Menteri  Dalam Negeri di Jakarta;</p>
                                <p class="p4" style="padding-left: 60px;">2. Sdr. Gubernur Jawa Timur di Surabaya;</p>
                                <p class="p4" style="padding-left: 60px;">3. Sdr. Kepala Cabang PT. Taspen di Malang;</p>
                                <p class="p4" style="padding-left: 60px;">4. Sdr. Kepala Badan Pengawasan Kab. Malang;</p>
                                <p class="p4" style="padding-left: 60px;">5. Sdr. Kepala BKPSDM Kab. Malang;</p>
                                <p class="p4" style="padding-left: 60px;">6. Sdr. Bendahara/Pembuat Daftar Gaji;</p>
                                <p class="p4" style="padding-left: 60px;">7. Sdr. Pegawai yang bersangkutan.</p>
                            </div> --}}
                            {{-- <div class="col-4 col-sm-6 posisiperihal2">
                                <p class="p2" style="text-align: center; padding-top: 10px;"><strong>KEPALA DINAS KOMUNIKASI DAN <br> INFORMATIKA</strong></p>
                                <p class="p2" style="text-align: center; padding-top: 120px;"><strong><u>ANISWATY AZIZ, SE, M. SI</u></strong></p>
                                <p class="p2" style="text-align: center;">Pembina Tk.I</p>
                                <p class="p2" style="text-align: center;">NIP. 19680701 199803 2 007</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>