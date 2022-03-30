@extends('layouts.tabellayout')
@section('title','Tabel Data Cuti')
@section('tabel','DUK')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tabel Data Daftar Urut Kepangkatan</h4>
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
                  <th>
                    Tempat Tanggal Lahir
                  </th>
                  <th>
                    Pangkat / <br>Gol. Ruang
                  </th>
                  <th>
                    TMT / <br>Gol. Ruang
                  </th>
                  <th>
                    Jabatan Terakhir
                  </th>
                  <th>
                    Masa Kerja <br>(Tahun)
                  </th>
                  <th>
                    Masa Kerja <br>(Bulan)
                  </th>
                  <th>
                    Pendidikan <br>Kepemimpinan
                  </th>
                  <th>
                    Tahun <br>Lulus
                  </th>
                  <th>
                    Pendidikan Terakhir, <br> Nama Sekolah
                  </th>
                  <th>
                    Tahun <br>Lulus
                  </th>
                  <th>
                    Jenis <br>Kelamin
                  </th>
                  <th>
                    Agama <br>Tahun
                  </th>
                  <th>
                    Tahun <br>Pensiun
                  </th>
                  <th>
                    Keterangan
                  </th>
                  <th>
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_duk as $duk)
                <tr>
                    <th scope="row">{{ $duk->id }}</th>
                    <td>{{ $duk->namapegawai }}</td>
                    <td>{{ $duk->nip }}</td>
                    <td>{{ $duk->ttl }}</td>
                    <td>{{ $duk->pangkat }}</td>
                    <td>{{ $duk->pegawaiDuk->tmt ?? ''}}</td> 
                    <td>{{ $duk->pegawaiDuk->jabatanterakhir ?? '' }}</td>
                    <td>{{ $duk->pegawaiDuk->mk_tahun ?? '' }}</td>
                    <td>{{ $duk->pegawaiDuk->mk_bulan ?? ''}}</td>
                    <td>{{ $duk->pegawaiDuk->pendidikan_kepemimpinan ?? ''}}</td>
                    <td>{{ $duk->pegawaiDuk->tahunlulus ?? ''}}</td>
                    <td>{{ $duk->pegawaiDuk->pendidikan_terakhir ?? ''}}</td>
                    <td>{{ $duk->pegawaiDuk->tahun_lulus ?? ''}}</td>
                    <td>{{ $duk->pegawaiDuk->jeniskelamin ?? ''}}</td> 
                    <td>{{ $duk->pegawaiDuk->agama_tahun ?? ''}}</td>
                    <td>{{ $duk->pegawaiDuk->tahunpensiun ?? ''}}</td>
                    <td>{{ $duk->pegawaiDuk->keterangan_duk ?? ''}}</td>
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