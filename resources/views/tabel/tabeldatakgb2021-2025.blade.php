@extends('layouts.tabellayoutkenaikan')
@section('title','Kelola Data KGB')
@section('kenaikan','Gaji Berkala')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kelola Data Kenaikan Gaji Berkala</h4>
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
                                        2021
                                    </th>
                                    <th>
                                        2022
                                    </th>
                                    <th>
                                        2023
                                    </th>
                                    <th>
                                        2024
                                    </th>
                                    <th>
                                        2025
                                    </th>
                                </tr>
                            </thead>
                                {{-- <tbody>
                                    @foreach ($datapegawai as $itempegawai)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">View</button>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Nama Pegawai :</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
@endsection