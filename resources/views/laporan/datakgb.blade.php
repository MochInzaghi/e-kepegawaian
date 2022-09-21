<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cetak Laporan Data KGB</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJISAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="{{ asset('template') }}/images/kementrian.png" />
</head>

<body style="background-color: white; margin-top: 0.5cm; margin-left: 0.5cm; margin-right: 0.5cm; margin-bottom: 0.5cm;"
    onload="window.print()">
    <style>
        .font {
            font-size: 20px;
            font-family: "Arial";
        }

        .logomalang {
            width: 160px;
            height: 200px;
            float: left;
            margin-left: 100px;
        }

        h3 {
            text-align: center;
            text-transform: uppercase;
            font-family: "Arial";
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            font-family: "Arial";
        }

        .posisikop {
            padding-top: 25px;
            padding-right: 150px;
            padding-left: 60px;
        }

        .posisiperihal1 {
            padding-left: 100px;
            padding-top: 40px;
        }

        /* .posisiperihal2{
                 padding-left: 130px;
             } */
        .posisiperihal3 {
            padding-left: 100px;
            padding-top: 205px;
        }

        .p1 {
            font-family: "Arial";
            font-size: 20px;
            word-spacing: 11px;
        }

        .pp {
            font-family: "Arial";
            font-size: 20px;
            word-spacing: 1px;
        }

        .p2 {
            font-family: "Arial";
            font-size: 20px;
        }

        .p3 {
            font-family: "Arial";
            font-size: 20px;
        }

        .p4 {
            font-family: "Arial";
            font-size: 20px;
        }

        .paragraf1 {
            padding-top: 50px;
            padding-left: 140px;
        }

        .paragraf2 {
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
                                <h5>Jalan A. Yani Utara No. 384 Telp./ Fax (0341) 408788</h5>
                                <h5>Website : www.kominfo.malangkab.go.id Email: kominfo@malangkab.go.id</h5>
                                <h3 style="text-decoration: underline;">M A L A N G &nbsp; 6 5 1 2 6</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-right: 10px;">
                        <div class="col-8 col-sm-6 posisiperihal1">
                            <p class="p1">Nomor <span style="margin-left: 23px;">:</span> 822.2/ /35.07.124/2021</p>
                            <p class="p1">Sifat <span style="margin-left: 43px;">:</span> - </p>
                            <p class="p1">Lampiran : - </p>
                            <p class="p1">Perihal <span style="margin-left: 22px;">:</span> <strong>KENAIKAN GAJI
                                    BERKALA</strong></p>
                        </div>
                        <div class="col-4 col-sm-6">
                            <p class="p2" style="padding-left: 130px;">Malang, &emsp;&emsp;Februari 2021</p>
                            <p class="p2" style="padding-left: 130px;">Kepada : </p>
                            <p class="p2" style="padding-left: 28px;">Yth. Sdr. &emsp;Badan Keuangan dan Aset</p>
                            <p class="p2" style="padding-left: 130px;">Daerah Kabupaten Malang</p>
                            <p class="p2" style="padding-left: 130px;">di-</p>
                            <p class="p2" style="padding-left: 210px"><strong>M A L A N G</strong></p>
                        </div>
                        <div class="col-md-12 paragraf1">
                            <p class="p1" style="text-indent: 5em;">Kepala Dinas Komunikasi dan Informatika
                                Kabupaten Malang dengan ini
                            <p class="pp">memberitahukan bahwa berhubung dengan telah dipenuhinya masa kerja dan
                                syarat–syarat
                            <p class="pp">lainnya kepada :</p>
                        </div>
                        <div class="container-fluid" style="margin-left: 185px;">
                            <table style="border-color: #FFFFFF">
                                <tbody>
                                    <tr class="d-flex" style="margin-top: -5px;">
                                        <td class="font" scope="row">1.</td>
                                        <td class="font" style="text-align: left;">Nama</td>
                                        <td class="font" style="margin-left: 220px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ $datapegawai->namapegawai }}</td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">2.</td>
                                        <td class="font" style="text-align: left">NIP</td>
                                        <td class="font" style="margin-left: 240px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ $datapegawai->nip }}</td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">3.</td>
                                        <td class="font" style="text-align: left">Tgl. Lahir</td>
                                        <td class="font" style="margin-left: 190px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ date('d-m-Y', strtotime($datapegawai->tgl_lahir)) }}</td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">4.</td>
                                        <td class="font" style="text-align: left">Pangkat / Gol</td>
                                        <td class="font" style="margin-left: 152px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ $datapegawai->pangkat }}</td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">5.</td>
                                        <td class="font" style="text-align: left">Jabatan</td>
                                        <td class="font" style="margin-left: 202px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ $datapegawai->jabatan }}</td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">6.</td>
                                        <td class="font" style="text-align: left">Kantor / Tempat</td>
                                        <td class="font" style="margin-left: 132px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">Dinas
                                            Komunikasi dan Informatika Kabupaten Malang</td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">7.</td>
                                        <td class="font" style="text-align: left">Gaji Pokok Lama</td>
                                        <td class="font" style="margin-left: 121px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            @currency($datapegawai->gajipokok),-</td>
                                        <td class="font" style="margin-left: 120px; margin-top: 5px;"><b>PP Nomor 30
                                                Tahun 2015</b></td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">Atas dasar Surat Keputusan terakhir tentang
                                            gaji/pangkat yang ditetapkan : </td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">a.</td>
                                        <td class="font" style="text-align: left">Oleh Pejabat</td>
                                        <td class="font" style="margin-left: 158px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ $datakgb->olehpejabat }}</td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">b.</td>
                                        <td class="font" style="text-align: left">Tanggal<br>Nomor</td>
                                        <td class="font" style="margin-left: 204px;">:<br>:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ date('d-m-Y', strtotime($datakgb->tgl)) }}<br>822.1/385/35.07.127/2019
                                        </td>
                                        </td>
                                    </tr>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">c.</td>
                                        <td class="font" style="text-align: left">Tanggal mulai berlakunya<br>Gaji
                                            tersebut</td>
                                        <td class="font" style="margin-left: 49px;"><br>:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            <br>{{ date('j', strtotime($datakgb->tgl_gaji)) . " " . $bulan[(int)date('n', strtotime($datakgb->tgl_gaji))-1] . " " .date('j', strtotime($datakgb->tgl_gaji)) }}
                                        </td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">d.</td>
                                        <td class="font" style="text-align: left">Masa Kerja Golongan<br>Pada
                                            tanggal tersebut</td>
                                        <td class="font" style="margin-left: 79px;"><br>:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            <br>{{ $datakgb->masakerja_tgl }}
                                        </td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">Diberikan Kenaikan gaji berkala hingga
                                            memperoleh : </td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 10px;">
                                        <td class="font" scope="row">8.</td>
                                        <td class="font" style="text-align: left"><b>Gaji Pokok Baru</b></td>
                                        <td class="font" style="margin-left: 121px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            <b>@currency($datakgb->gajibaru),-</b>
                                        </td>
                                        <td class="font" style="margin-left: 120px; margin-top: -5px"><b>PP Nomor 15
                                                Tahun 2015</b></td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" scope="row">9.</td>
                                        <td class="font" style="text-align: left">Berdasarkan Masa Kerja</td>
                                        <td class="font" style="margin-left: 55px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ $datakgb->masakerja }}
                                        </td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" style="margin-left: -11px;" scope="row">10.</td>
                                        <td class="font" style="text-align: left">Dalam Golongan Ruang</td>
                                        <td class="font" style="margin-left: 60px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ $datakgb->gol_ruang }}</td>
                                    </tr>
                                    <tr class="d-flex" style="margin-top: 5px;">
                                        <td class="font" style="margin-left: -9px;" scope="row">11.</td>
                                        <td class="font" style="text-align: left">Mulai Tanggal</td>
                                        <td class="font" style="margin-left: 151px;">:</td>
                                        <td class="font" style="text-align: left; margin-left: 20px;">
                                            {{ date('d-m-Y', strtotime($datakgb->mulai_tgl)) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 paragraf1">
                            <p style="text-indent: 5em; font-family: Arial; font-size: 20px; word-spacing: 1px;">
                                Diharapkan agar sesuai dengan <u>Peraturan Pemerintah Repubik Indonesia Nomor 15 <p
                                        style="text-indent: 0.5em; font-family: Arial; font-size: 20px; word-spacing: 1px;">
                                        Tahun 2019</u> kepada Pegawai tersebut dapat dibayarkan penghasilanya
                                berdasarkan gaji pokok</p>
                            <p style="font-family: Arial; font-size: 20px; word-spacing: 1px; text-indent: 0.5em"">yang
                                baru.</p>
                        </div>
                        <div class="col-8 col-sm-6 posisiperihal3">
                            <p class="p4">Tembusan surat ini disampaikan kepada Yth. :</p>
                            <p class="p4" style="padding-left: 60px;">1. Sdr. Menteri Dalam Negeri di Jakarta;</p>
                            <p class="p4" style="padding-left: 60px;">2. Sdr. Gubernur Jawa Timur di Surabaya;</p>
                            <p class="p4" style="padding-left: 60px;">3. Sdr. Kepala Cabang PT. Taspen di Malang;
                            </p>
                            <p class="p4" style="padding-left: 60px;">4. Sdr. Kepala Badan Pengawasan Kab. Malang;
                            </p>
                            <p class="p4" style="padding-left: 60px;">5. Sdr. Kepala BKPSDM Kab. Malang;</p>
                            <p class="p4" style="padding-left: 60px;">6. Sdr. Bendahara/Pembuat Daftar Gaji;</p>
                            <p class="p4" style="padding-left: 60px;">7. Sdr. Pegawai yang bersangkutan.</p>
                        </div>
                        <div class="col-4 col-sm-6 posisiperihal2">
                            <p class="p2" style="text-align: center; padding-top: 10px;"><strong>KEPALA DINAS
                                    KOMUNIKASI DAN <br> INFORMATIKA</strong></p>
                            <p class="p2" style="text-align: center; padding-top: 120px;"><strong><u>ANISWATY
                                        AZIZ, SE, M. SI</u></strong></p>
                            <p class="p2" style="text-align: center;">Pembina Tk.I</p>
                            <p class="p2" style="text-align: center;">NIP. 19680701 199803 2 007</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
