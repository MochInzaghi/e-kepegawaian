@extends('layouts.tabellayoutkenaikan')
@section('title','Kelola Data KP')
@section('kenaikan','Pangkat')


@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kelola Data Kenaikan Pangkat</h4>
          <div class="table-responsive pt-3">
            @include('sweetalert::alert')
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
                                @if ($date == date('Y', strtotime($itempegawai->kp)))
                                    {{ date('d F', strtotime($itempegawai->kp)) }} <br>
                                    <button class="btn btn-info btn sm inline" data-toggle="modal" data-target="#view">View</button>
                                    <a href="datakp/{{ $itempegawai->id }}/edit" class="btn btn-success btn sm inline">Edit</a>
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
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          @endsection