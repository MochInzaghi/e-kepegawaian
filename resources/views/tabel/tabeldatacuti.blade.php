@extends('layouts.tabellayoutcuti')
@section('title','Kelola Data Cuti')
@section('url','cuti')
@section('tabel','Cuti')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kelola Data Cuti</h4>
          <a href="#" class="btn btn-primary btn-sm text-white me-0 btn-"><i class="icon-plus"></i> Tambah Data</a>
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
                    Jabatan
                  </th>
                  <th>
                    Jenis Cuti
                  </th>
                  <th>
                    Dari Tanggal
                  </th>
                  <th>
                    Sampai Tanggal
                  </th>
                  <th class="thratakiri">
                    Jumlah <br>Hari Kerja
                  </th>
                  <th class="thratakiri">
                    Sisa Cuti <br>Tahunan YBS
                  </th>
                  <th>
                    Pejabat
                  </th>
                  <th>
                    No. Surat
                  </th>
                  <th>
                    Tanggal
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
              @foreach($data_cuti as $cuti)
                <tr>
                  <th scope="row">{{ $cuti->id }}</th>
                  <td>{{$cuti->namapegawai}}</td>
                  <td>{{$cuti->nip}}</td>
                  <td>{{$cuti->jabatan}}</td>
                  <td>{{$cuti->jeniscuti}}</td>
                  <td>{{ date('d F Y', strtotime( $cuti->daritgl )) }}</td> 
                  <td>{{ date('d F Y', strtotime($cuti->sampaitgl)) }}</td>
                  <td>{{$cuti->jmlhrkrj}}</td>
                  <td>{{$cuti->sisacuti}}</td>
                  <td>{{$cuti->pejabat}}</td>
                  <td>{{$cuti->nosurat}}</td>
                  <td>{{ date('d F Y', strtotime($cuti->tanggal)) }}</td>
                  <td>{{$cuti->keterangan}}</td>
                  <td>
                  <a href="datacuti/{{ $cuti->id }}/edit" class="btn btn-primary d-inline ml-3">Edit</a>
                  <form class="d-inline ml-3 delete-confirm" action = "datacuti/{{ $cuti->id }}/delete" method="POST">
                    @csrf
                    @method("delete")
                      <button class="btn btn-danger btn sm inline" type="submit">Hapus</button>
                  </form>  
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