@extends('layouts.tabellayoutduk')
@section('title','Kelola Data DUK')
@section('tabel','DUK')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kelola Data Daftar Urut Kepangkatan</h4>
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
                    Tempat Tanggal Lahir
                  </th>
                  <th class = "thratatengah">
                    Pangkat / <br>Gol. Ruang
                  </th>
                  <th class = "thratatengah">
                    TMT / <br>Gol. Ruang
                  </th>
                  <th class = "thratatengah">
                    Jabatan Terakhir
                  </th>
                  <th class = "thratatengah">
                    TMT Jabatan
                  </th>
                  <th class = "thratatengah">
                    Masa Kerja <br>(Tahun)
                  </th>
                  <th class = "thratatengah">
                    Masa Kerja <br>(Bulan)
                  </th>
                  <th class = "thratatengah">
                    Pendidikan <br>Kepemimpinan
                  </th>
                  <th class = "thratatengah">
                    Tahun <br>Lulus
                  </th>
                  <th class = "thratatengah"">
                    Pendidikan Terakhir, <br> Nama Sekolah
                  </th>
                  <th class = "thratatengah">
                    Tahun <br>Lulus
                  </th>
                  <th class = "thratatengah">
                    Jenis <br>Kelamin
                  </th>
                  <th class = "thratatengah">
                    Agama <br>Tahun
                  </th>
                  <th class = "thratatengah">
                    Tahun <br>Pensiun
                  </th>
                  <th class = "thratatengah">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_duk as $duk)
                <tr>
                    <th class = "thratatengah" scope="row">{{ $duk->id }}</th>
                    <td>{{ $duk->namapegawai }}</td>
                    <td class = "thratatengah">{{ $duk->nip }}</td>
                    <td class = "thratatengah">{{ $duk->ttl }}</td>
                    <td class = "thratatengah">{{ $duk->pangkat }}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->tmt ?? ''}}</td> 
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->jabatanterakhir ?? '' }}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->tmt_jabatan ?? '' }}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->mk_tahun ?? '' }}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->mk_bulan ?? ''}}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->pendidikan_kepemimpinan ?? ''}}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->tahunlulus ?? ''}}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->pendidikan_terakhir ?? ''}}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->tahun_lulus ?? ''}}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->jeniskelamin ?? ''}}</td> 
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->agama_tahun ?? ''}}</td>
                    <td class = "thratatengah">{{ $duk->pegawaiDuk->tahunpensiun ?? ''}}</td>
                    <td>
                      <a href="dataduk/{{ $duk->id }}/edit" class="btn btn-primary btn sm inline">Edit</a>
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