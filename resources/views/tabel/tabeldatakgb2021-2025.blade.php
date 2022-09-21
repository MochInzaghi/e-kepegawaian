@extends('layouts.tabellayoutkgb')
@section('title', 'Kelola Data KGB')
@section('kenaikan', 'Gaji Berkala')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="title-kgb"></h4>
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
                                                <td class="thratatengah">
                                                    @foreach ($kgbPegawai["year"][$itempegawai->id] as $item)
                                                        @if ($item == $date)
                                                        {{ date('j', strtotime($itempegawai->kgb)) . " " . $bulan[(int)date('n', strtotime($itempegawai->kgb))-1] . " " .$date }}
                                                           
                                                            {{-- <button class="btn btn-info btn sm inline" data-toggle="modal"
                                                                data-target="#view">View</button> --}}

                                                            {{-- @foreach ($datakgb as $kgb)
                                                                <a href="datakgb/{{ $kgb->id }}/edit"
                                                                    class="btn btn-success btn sm inline">Edit</a>
                                                                <a href="datakgb/{{ $kgb->id }}/print"
                                                                    class="btn btn-primary btn sm inline"
                                                                    type="submit">Print</button>
                                                            @endforeach --}}
                                                            @if ($kgbPegawai['idKGB'][$itempegawai->id][$item] == null)
                                                            
                                                            <br><button class="btn btn-info btn sm inline" data-toggle="modal" data-target="#myModal">View</button>
                                                            <a href="/admin/datakgb/{{ $itempegawai->id }}/insert"
                                                                    class="btn btn-success btn sm inline">Insert</a>
                                                            <a href="/admin/datakgb/error"
                                                                    class="btn btn-primary btn sm inline"
                                                                    type="submit">Print</button>   
                                                            @else
                                                                <br><button class="btn btn-info btn sm inline"
                                                                onclick="showModalKgb({{ $kgbPegawai['idKGB'][$itempegawai->id][$item]->getOriginal('id') }})">View</button>
                                                                <a href="/admin/datakgb/{{ $kgbPegawai['idKGB'][$itempegawai->id][$item]->getOriginal('id') }}/edit"
                                                                    class="btn btn-success btn sm inline">Edit</a>
                                                                <a href="/admin/datakgb/{{ $kgbPegawai['idKGB'][$itempegawai->id][$item]->getOriginal('id') }}/print"
                                                                    class="btn btn-primary btn sm inline">Print</a>
                                                            @endif                                                     
                                                        @endif
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>

                                <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">Detail Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" id="showBodyModal">
                                            {{-- dynamic modal --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                    </div>
                                </div>
                            </div>

                                {{-- modal --}}
                                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel">Detail Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="showViewModal">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function showModalKgb(id) {
            const url = '/showmodal-kgb/' + id;
            $.get(url, function(data) {
                console.log(data);
                $('#showViewModal').html(data);
                $('#showModal').modal('show');
            })
        }
    </script>
    
    {{-- <script>
        //document.getElementById('startdate').on('change', filterDate());
        $('#startdate').on('change', function () {
            //console.log($('select#startdate').val());
            $.ajax({
                type : "POST",
                url : '/admin/datakgb/filter',
                data : {
                    'startdate' : $('select#startdate').val(),
                    'enddate' : $('select#enddate').val(),
                },
                success : function(data){
                    //$('#filter').html(data);
                    console.log(data);
                }
            });
        })
        // function filterDate(){
        //     $.ajax({
        //         type : "POST",
        //         url : '/admin/datakgb/filter',
        //         data : {
        //             'startdate' : document.getElementById('startdate'),
        //             'enddate' : document.getElementById('enddate'),
        //         },
        //         success : function(data){
        //             $('#filter').html(data);
        //         }
        //     });
        // }
</script> --}}
@endsection
