@extends('layouts.tabellayout')
@section('title','Tabel Data Pensiun')
@section('tabel','Pensiun')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tabel Data Pensiun</h4>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
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
                  <th class="thratakiri">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_pensiun as $pensiun)
                <tr>
                  <th scope="row">{{ $pensiun->id }}</th>
                  <td>{{ $pensiun->namapegawai }}</td>
                  <td>{{ $pensiun->nip }}</td>
                  <td>{{ $pensiun->pangkat }}</td>
                  <td>{{ $pensiun->pegawaiPensiun->tl_sk_pertama ?? '' }}</td> 
                  <td>{{ $pensiun->pegawaiPensiun->tmt_58 ?? '' }}</td>
                  <td>{{ $pensiun->pegawaiPensiun->tmt_60 ?? '' }}</td>
                  <td>{{ $pensiun->pegawaiPensiun->tanggal ?? '' }}</td>
                  <td>{{ $pensiun->pegawaiPensiun->no_sk ?? '' }}</td>
                  <td>{{ $pensiun->pegawaiPensiun->keterangan_pensiun ?? '' }}</td>
                  <td>
                    <a href="datapensiun/{{ $pensiun->id }}/edit" class="btn btn-primary btn sm inline">Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection