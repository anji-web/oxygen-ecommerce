@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Kategori</th>
                    {{-- @if(Auth::user()->role != 'MANAGER')
                    <th scope="col">
                        Action
                    </th>
                    @endif --}}
                  </tr>
                </thead>
                <tbody>
                    @foreach($databarang as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->nama_barang}}</td>
                            <td>{{$d->stok}}</td>
                            <td>{{$d->nama_kategori}}</td>
                            {{-- @if(Auth::user()->role != 'MANAGER')
                            <td>
                                <button onclick="window.location='{{ route("editbarang", ["id" => $d->id]) }}'" class="btn btn-success">edit</button>
                                <button onclick="window.location='{{ route("deletebarang", ["id" => $d->id]) }}'" class="btn btn-danger">delete</button>
                            </td>
                            @endif --}}
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection