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
                  <th class="thratatengah">
                    No
                  </th>
                  <th class="thratatengah">
                    Nama Pegawai
                  </th>
                  <th class="thratatengah">
                    NIP
                  </th>
                  @foreach ($dates as $tahun)
                  <th class="thratatengah">
                      {{ $tahun }}
                  </th>
                   @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach ($datapegawai as $index => $itempegawai)
                    <tr>
                        <td class="thratatengah">{{ $index + 1 }}</td>
                        <td>{{ $itempegawai->namapegawai }}</td>
                        <td class="thratatengah">{{ $itempegawai->nip }}</td>
                        @foreach ($dates as $date)
                        <td>
                          @foreach ($kpPegawai[$itempegawai->id] as $item)
                              @if ($item == $date)
                              {{ date('d F ', strtotime($itempegawai->kp)).$date }}
                                  <br><button class="btn btn-info btn sm inline"
                                      onclick="showModalKp({{ $itempegawai->id }})">View</button>
                                  {{-- <button class="btn btn-info btn sm inline" data-toggle="modal"
                                      data-target="#view">View</button> --}}

                                  {{-- @foreach ($datakgb as $kgb)
                                      <a href="datakgb/{{ $kgb->id }}/edit"
                                          class="btn btn-success btn sm inline">Edit</a>
                                      <a href="datakgb/{{ $kgb->id }}/print"
                                          class="btn btn-primary btn sm inline"
                                          type="submit">Print</button>
                                  @endforeach --}}
                                  <a href="/admin/datakgb/{{ $itempegawai->id }}/edit"
                                      class="btn btn-success btn sm inline">Edit</a>
                                  <a href="/admin/datakgb/{{ $itempegawai->id }}/print"
                                      class="btn btn-primary btn sm inline"
                                      type="submit">Print</button>                                                        
                              @endif
                          @endforeach
                      </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
                             <div class="modal fade" id="showModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">Detail Data</h5>
                                              @if ($status = 'Belum Lengkap')
                                                  <button style="margin-left: 210px;"  class="btn btn-danger btn-sm">Belum Lengkap</button>
                                              @elseif ($status = 'Sudah Lengkap')
                                                  <button style="margin-left: 210px;" class="btn btn-success btn-sm">Sudah Lengkap</button>
                                              @endif
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" id="showBodyModal">
                                            {{-- dynamic modal --}}
                                        </div>
                                        <div class="modal-footer">
                                            {{-- <button type="button" class="btn btn-danger"
                                                id="deleteButton">Delete</button> --}}
                                            {{-- <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button> --}}
                                            {{-- <button type="button" class="btn btn-primary" id="btnSubmmit"></button> --}}
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
                <script>
                  function showModalKp(id) {
                      const url = '/showmodal-kp/' + id;
                      $.get(url, function(data) {
                          $('#showBodyModal').html(data);
                          $('#showModal').modal('show');
                      })
                  }
              </script>
          
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          @endsection