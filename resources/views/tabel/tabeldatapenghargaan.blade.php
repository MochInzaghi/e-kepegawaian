@extends('layouts.tabellayoutpenghargaan')
@section('title','Kelola Data Penghargaan')
@section('tabel','Penghargaan')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kelola Data Penghargaan</h4>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class = "thratatengah">
                    No
                  </th>
                  <th class = "thratatengah">
                    Nama Pegawai
                  </th>
                  <th class = "thratatengah">
                    NIP
                  </th>
                  <th class = "thratatengah">
                    Gelar Tanda Kehormatan<br>10 Tahun
                  </th>
                  <th class = "thratatengah">
                    Gelar Tanda Kehormatan<br>20 Tahun
                  </th>
                  <th class = "thratatengah">
                    Gelar Tanda Kehormatan<br>30 Tahun
                  </th>
                  <th class = "thratatengah">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_penghargaan as $penghargaan)
                @php
                  $bulan10 = $bulan[(int)date('n', strtotime($penghargaan->pegawaiPenghargaan->thn_10 ?? ''))-1];
                  $date10 = date('j', strtotime($penghargaan->pegawaiPenghargaan->thn_10 ?? '')). " " . $bulan10 . " " . date('Y', strtotime($penghargaan->pegawaiPenghargaan->thn_10 ?? ''));
                  $bulan20 = $bulan[(int)date('n', strtotime($penghargaan->pegawaiPenghargaan->thn_20 ?? ''))-1];
                  $date20 = date('j', strtotime($penghargaan->pegawaiPenghargaan->thn_20 ?? '')). " " . $bulan20 . " " . date('Y', strtotime($penghargaan->pegawaiPenghargaan->thn_20 ?? ''));
                  $bulan30 = $bulan[(int)date('n', strtotime($penghargaan->pegawaiPenghargaan->thn_30 ?? ''))-1];
                  $date30 = date('j', strtotime($penghargaan->pegawaiPenghargaan->thn_30 ?? '')). " " . $bulan30 . " " . date('Y', strtotime($penghargaan->pegawaiPenghargaan->thn_30 ?? ''));
                @endphp
                <tr>
                    <th class = "thratatengah" scope="row">{{ $penghargaan->id }}</th>
                    <td>{{ $penghargaan->namapegawai }}</td>
                    <td>{{ $penghargaan->nip }}</td>
                    @if(empty($penghargaan->pegawaiPenghargaan->thn_10) and empty($penghargaan->pegawaiPenghargaan->thn_20) and empty($penghargaan->pegawaiPenghargaan->thn_30) )
                      <td class = "thratatengah">{{ $penghargaan->pegawaiPenghargaan->thn_10 ?? '' }}</td>
                      <td class = "thratatengah">{{ $penghargaan->pegawaiPenghargaan->thn_20 ?? '' }}</td>
                      <td class = "thratatengah">{{ $penghargaan->pegawaiPenghargaan->thn_30 ?? '' }}</td>
                    @elseif(empty($penghargaan->pegawaiPenghargaan->thn_20) and empty($penghargaan->pegawaiPenghargaan->thn_30))
                      <td class = "thratatengah">{{ $date10 ?? '' }}</td>
                      <td class = "thratatengah">{{ $penghargaan->pegawaiPenghargaan->thn_20 ?? '' }}</td>
                      <td class = "thratatengah">{{ $penghargaan->pegawaiPenghargaan->thn_30 ?? '' }}</td>
                    @elseif(empty($penghargaan->pegawaiPenghargaan->thn_30))
                      <td class = "thratatengah">{{ $date10 }}</td>
                      <td class = "thratatengah">{{ $date20 }}</td>
                      <td class = "thratatengah">{{ $penghargaan->pegawaiPenghargaan->thn_30 ?? '' }}</td>
                    @else
                    <td class = "thratatengah">{{ $date10 }}</td>
                    <td class = "thratatengah">{{ $date20 }}</td>
                    <td class = "thratatengah">{{ $date30 }}</td>
                    @endif
                    <td>
                      <a href="datapenghargaan/{{ $penghargaan->id }}/edit" class="btn btn-primary btn sm inline">Edit</a>
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