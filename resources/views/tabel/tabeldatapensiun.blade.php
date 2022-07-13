@extends('layouts.tabellayoutpensiun')
@section('title','Kelola Data Pensiun')
@section('tabel','Pensiun')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kelola Data Pensiun</h4>
          <div class="table-responsive pt-3">
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
                  <th class="thratatengah">
                    Pangkat / Gol. Ruang
                  </th>
                  <th class="thratatengah">
                    Tanggal Lahir Pada <br> SK Pengangkatan <br> Pertama
                  </th>
                  <th class="thratatengah">
                    58 Tahun Yang <br> Akan Datang <br> Pada (TMT)
                  </th>
                  <th class="thratatengah">
                    60 Tahun Yang <br> Akan Datang <br> Pada (TMT)
                  </th>
                  <th class="thratatengah">
                    Tanggal
                  </th>
                  <th class="thratatengah">
                    No. SK
                  </th>
                  <th class="thratatengah">
                    Keterangan
                  </th>
                  <th class="thratatengah">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_pensiun as $pensiun)
                <tr>
                  <th class = "thratatengah" scope="row">{{ $pensiun->id }}</th>
                  <td>{{ $pensiun->namapegawai }}</td>
                  <td class = "thratatengah">{{ $pensiun->nip }}</td>
                  <td class = "thratatengah">{{ $pensiun->pangkat }}</td>
                  <td class = "thratatengah">{{ $pensiun->pegawaiPensiun->tl_sk_pertama ?? '' }}</td> 
                  <td class = "thratatengah">{{ $pensiun->pegawaiPensiun->tmt_58 ?? '' }}</td>
                  <td class = "thratatengah">{{ $pensiun->pegawaiPensiun->tmt_60 ?? '' }}</td>
                  <td class = "thratatengah">{{  date('d F Y', strtotime($pensiun->pegawaiPensiun->tanggal ?? '')) }}</td>
                  <td class = "thratatengah">{{ $pensiun->pegawaiPensiun->no_sk ?? '' }}</td>
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