@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()->role != 'MANAGER')
            <button onclick="window.location='{{ route("buatdatasupplier") }}'" class="btn btn-info mb-3">Input Data Supplier</button>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">ID Supplier</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                    @if(Auth::user()->role != 'MANAGER')
                    <th scope="col">
                        Action
                    </th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->nama_supplier}}</td>
                            <td>{{$d->alamat}}</td>
                            <td>{{$d->no_telp}}</td>
                            <td>
                                @if(Auth::user()->role != 'MANAGER')
                                <button onclick="window.location='{{ route("datasupplieredit", ["id" => $d->id]) }}'" class="btn btn-success">edit</button>
                                <button onclick="window.location='{{ route("datasupplierdelete", ["id" => $d->id]) }}'" class="btn btn-danger">delete</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection