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
                                            Pangkat
                                        </th>
                                        <th class = "thratatengah">
                                            Jabatan
                                        </th>
                                        <th class = "thratatengah">
                                            Jenjang
                                        </th>
                                        <th class = "thratatengah">
                                            No Telepon
                                        </th>
                                        <th class = "thratatengah">
                                            Terakhir KGB
                                        </th>
                                        <th class = "thratatengah">
                                            Terakhir KP
                                        </th>
                                        <th class = "thratatengah">
                                            Gaji Pokok
                                        </th>
                                        <th class = "thratatengah">
                                            Keterangan
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pegawai as $pegawai)
                                        @php
                                            $bulankgb = $bulan[(int)date('n', strtotime($pegawai->kgb))-1];
                                            $datekgb = date('j', strtotime($pegawai->kgb)). " " . $bulankgb . " " . date('Y', strtotime($pegawai->kgb));
                                            $bulankp = $bulan[(int)date('n', strtotime($pegawai->kp))-1];
                                            $datekp = date('j', strtotime($pegawai->kp)). " " . $bulankp . " " . date('Y', strtotime($pegawai->kp));
                                        @endphp
                                        <tr>
                                            <th class = "thratatengah" scope="row">{{ $pegawai->id }}</th>
                                            <td>{{ $pegawai->namapegawai }}</td>
                                            <td class = "thratatengah">{{ $pegawai->nip }}</td>
                                            <td class = "thratatengah">{{ $pegawai->ttl }}</td>
                                            <td class = "thratatengah">{{ $pegawai->pangkat }}</td>
                                            <td class = "thratatengah">{{ $pegawai->jabatan }}</td>
                                            <td class = "thratatengah">{{ $pegawai->jenjang }}</td>
                                            <td class = "thratatengah">{{ $pegawai->notelp }}</td>
                                            <td class = "thratatengah">{{ $datekgb }}</td>
                                            <td class = "thratatengah">{{ $datekp }}</td>
                                            <td class = "thratatengah">Rp. {{ number_format($pegawai->gajipokok) }},000</td>
                                            <td class = "thratatengah">{{ $pegawai->keterangan }}</td>
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
                                                <button onclick="delPegawai({{ $pegawai->id }})"
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function delPegawai(id) {
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
console.log('hai');
    </script>
@endsection
