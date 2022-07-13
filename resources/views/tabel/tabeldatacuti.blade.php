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
          <a href="{{ route('create.cuti') }}" class="btn btn-primary btn-sm text-white me-0 btn-"><i class="icon-plus"></i> Tambah Data</a>
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
                    Jabatan
                  </th>
                  <th class = "thratatengah">
                    Jenis Cuti
                  </th>
                  <th class = "thratatengah">
                    Dari Tanggal
                  </th>
                  <th class = "thratatengah">
                    Sampai Tanggal
                  </th>
                  <th class = "thratatengah">
                    Jumlah <br>Hari Kerja
                  </th>
                  <th class = "thratatengah">
                    Sisa Cuti <br>Tahunan YBS
                  </th>
                  <th class = "thratatengah">
                    Pejabat
                  </th>
                  <th class = "thratatengah">
                    No. Surat
                  </th>
                  <th class = "thratatengah">
                    Tanggal
                  </th>
                  <th class = "thratatengah">
                    Keterangan
                  </th>
                  <th class = "thratatengah">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
              @foreach($data_cuti as $cuti)
                <tr>
                  <th class = "thratatengah" scope="row">{{ $cuti->id }}</th>
                  <td>{{$cuti->namapegawai}}</td>
                  <td class = "thratatengah">{{$cuti->nip}}</td>
                  <td class = "thratatengah">{{$cuti->jabatan}}</td>
                  <td class = "thratatengah">{{$cuti->jeniscuti}}</td>
                  <td class = "thratatengah">{{ date('d F Y', strtotime( $cuti->daritgl )) }}</td> 
                  <td class = "thratatengah">{{ date('d F Y', strtotime($cuti->sampaitgl)) }}</td>
                  <td class = "thratatengah">{{$cuti->jmlhrkrj}}</td>
                  <td class = "thratatengah">{{$cuti->sisacuti}}</td>
                  <td class = "thratatengah">{{$cuti->pejabat}}</td>
                  <td class = "thratatengah">{{$cuti->nosurat}}</td>
                  <td class = "thratatengah">{{ date('d F Y', strtotime($cuti->tanggal)) }}</td>
                  <td>{{$cuti->keterangan}}</td>
                  <td>
                  <a href="datacuti/{{ $cuti->id }}/edit" class="btn btn-primary d-inline ml-3">Edit</a>
                  <button onclick="deleteCuti({{ $cuti->id }})"
                    class="d-inline ml-3 btn btn-danger btn sm inline"
                    type="submit">Hapus</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
function deleteCuti(id) {
    url = `/admin/datacuti/${id}/delete`
    swal({
        title: 'Apakah anda yakin ingin menghapus data ini?',
        text: 'Catatan ini dan detailnya akan dihapus secara permanen!',
        icon: 'warning',
        buttons: ["Batal", "Hapus"],
    }).then(function(value) {
        if (value) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    '_method': 'DELETE'
                },
                success: function(result) {
                    swal({
                        title: 'Berhasil!',
                        text: 'Data berhasil dihapus!',
                        icon: 'success',
                        button: 'OK',
                    }).then(function() {
                        location.reload()
                    });
                }
            })
        }
    });
}
</script>
@endsection