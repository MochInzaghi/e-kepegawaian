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
                                            @foreach ($dates as $date)
                                                <td>
                                                    @if ($date == date('Y', strtotime($itempegawai->kgb)))
                                                        {{ date('d F', strtotime($itempegawai->kgb)) }} <br>
                                                        <button class="btn btn-info btn sm inline" data-toggle="modal" data-target="#view">View</button>
                                                        <button class="btn btn-success btn sm inline" data-toggle="modal" data-target="#edit">Edit</button>
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
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Nama Pegawai
                                                        :</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Dokumen Kenaikan
                                                        :</label>
                                                    <input type="file" class="form-control" id="recipient-name">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
