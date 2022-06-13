@extends('layouts.tabellayoutkenaikan')
@section('title', 'Kelola Data KGB')
@section('kenaikan', 'Gaji Berkala')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="title-kgb"></h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
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
                                        @foreach ($dates as $tahun)
                                            <th>
                                                {{ $tahun }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datapegawai as $index => $itempegawai)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $itempegawai->namapegawai }}</td>
                                            <td>{{ $itempegawai->nip }}</td>
                                            @foreach ($dates as $date)
                                                <td>
                                                    @if ($date == date('Y', strtotime($itempegawai->kgb)))
                                                        {{ date('d F', strtotime($itempegawai->kgb)) }} <br>
                                                        <button class="btn btn-info btn sm inline" data-toggle="modal" data-target="#view">View</button>
                                                        <a href="datakgb/{{ $itempegawai->id }}/edit" class="btn btn-success btn sm inline">Edit</a>
                                                        <a href="" class="btn btn-primary btn sm inline" type="submit">Print</button>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                                <div class="modal fade" id="view" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="data_pegawai_id" value="{{ $itempegawai->id }}">
                                                <div class="form-group">
                                                    <label for="nama">Nama Pegawai</label>
                                                    <input type="text" class="form-control" id="nama" name="namapegawai" value="{{ old('namapegawai') ?? $itempegawai->namapegawai }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip') ?? $itempegawai->nip }}" disabled>
                                                </div>
                                                @foreach ($data_view as $data_view)
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tanggal Lahir :</label>
                                                    <input type="date" name="tgl_lahir" class="form-control" id="recipient-name" value="{{ old('tgl_lahir') ?? $data_view->tgl_lahir }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tanggal :</label>
                                                    <input type="date" name="tgl" class="form-control" id="recipient-name" value="{{ old('tgl') ?? $data_view->tgl }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tanggal Mulai Berlakunya Gaji :</label>
                                                    <input type="date" name ="tgl_gaji" class="form-control" id="recipient-name" value="{{ old('tgl_gaji') ?? $data_view->tgl_gaji }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Masa Kerja Golongan Pada Tanggal Tersebut :</label>
                                                    <input type="text" name="masakerja_tgl" class="form-control" id="recipient-name" value="{{ old('masakerja_tgl') ?? $data_view->masakerja_tgl }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Gaji Pokok Baru :</label> 
                                                    <input type="text" name="gajibaru" class="form-control" id="recipient-name" value="{{ old('gajibaru') ?? $data_view->gajibaru }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Berdasarkan Masa Kerja :</label>
                                                    <input type="text" name="masakerja" class="form-control" id="recipient-name" value="{{ old('masakerja') ?? $data_view->masakerja }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Dalam Golongan Ruang :</label>
                                                    <input type="text" name="gol_ruang" class="form-control" id="recipient-name" value="{{ old('gol_ruang') ?? $data_view->gol_ruang }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Mulai Tanggal :</label>
                                                    <input type="date" name="mulai_tgl" class="form-control" id="recipient-name" value="{{ old('mulai_tgl') ?? $data_view->mulai_tgl }}" disabled>
                                                </div>
                                            </div>   
                                            @endforeach                                      
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection
