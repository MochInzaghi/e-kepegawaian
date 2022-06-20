@extends('layouts.tabellayoutpegawai')
@section('title', 'Kelola Data Pegawai')
@section('crud', 'Pegawai')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kelola Data Pegawai</h4>
                        <a href="{{ route('create.pegawai') }}" class="btn btn-primary btn-sm text-white me-0 btn-"><i
                                class="icon-plus"></i> Tambah Data</a>
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
                                            Pangkat
                                        </th>
                                        <th>
                                            Jabatan
                                        </th>
                                        <th>
                                            Jenjang
                                        </th>
                                        <th>
                                            No Telepon
                                        </th>
                                        <th>
                                            Terakhir KGB
                                        </th>
                                        <th>
                                            Terakhir KP
                                        </th>
                                        <th>
                                            Gaji Pokok
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
                                    @foreach ($data_pegawai as $pegawai)
                                        <tr>
                                            <th scope="row">{{ $pegawai->id }}</th>
                                            <td>{{ $pegawai->namapegawai }}</td>
                                            <td>{{ $pegawai->nip }}</td>
                                            <td>{{ $pegawai->ttl }}</td>
                                            <td>{{ $pegawai->pangkat }}</td>
                                            <td>{{ $pegawai->jabatan }}</td>
                                            <td>{{ $pegawai->jenjang }}</td>
                                            <td>{{ $pegawai->notelp }}</td>
                                            <td>{{ date('d F Y', strtotime($pegawai->kgb)) }}</td>
                                            <td>{{ date('d F Y', strtotime($pegawai->kp)) }}</td>
                                            <td>Rp. {{ number_format($pegawai->gajipokok) }},000</td>
                                            <td>{{ $pegawai->keterangan }}</td>
                                            <td>
                                                <a href="datapegawai/{{ $pegawai->id }}/edit"
                                                    class="btn btn-primary btn sm inline">Edit</a>
                                                {{-- <form class="d-inline ml-3 delete-pegawai"
                                                    action="/admin/datapegawai/{{ $pegawai->id }}/delete"
                                                    onclick="thisclick()" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn sm inline"
                                                        type="submit">Hapus</button>
                                                </form> --}}
                                                <button onclick="deletePegawai({{ $pegawai->id }})"
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
        function deletePegawai(id) {
            url = `/admin/datapegawai/${id}/delete`
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
