@extends('layouts.tabellayoutkenaikan')
@section('title','Kelola Data KP')
@section('kenaikan','Pangkat')


@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kelola Data Kenaikan Pangkat</h4>
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
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td> 
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody> --}}
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection