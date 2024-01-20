@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()->role != 'MANAGER')
            <button onclick="window.location='{{ route("buatbagianpenjualan") }}'" class="btn btn-info mb-3">Input Data Bagian Penjualan</button>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">ID Bagian Penjualan</th>
                    <th scope="col">Nama Bagian Penjualan</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">
                        Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->user}}</td>
                            <td>{{$d->gender}}</td>
                            <td>{{$d->no_telp}}</td>
                            <td>{{$d->tempat_lahir}}</td>
                            <td>{{$d->tanggal_lahir}}</td>
                            <td>{{$d->alamat}}</td>
                            @if(Auth::user()->role != 'MANAGER')
                            <td>
                                <button onclick="window.location='{{ route("databagianpenjualanedit", ["id" => $d->id]) }}'" class="btn btn-success">edit</button>
                                <button onclick="window.location='{{ route("databagianpenjualandelete", ["id" => $d->id]) }}'" class="btn btn-danger">delete</button>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection