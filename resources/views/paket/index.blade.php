@extends('templates.gentelella')

@section('title-of-content')
    Paket
@endsection

<!-- Paket -->
@section('content')

<!-- Tambah Data Paket -->
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#IsiBarang">
            <i> Isi Data!</i>
        </button>

<!-- READ DATA -->
        <table id="tbl-barang" class="table table-hover">
            <thead>
            <tr>
                <th>No.</th>
                <th>Id_Outlet</th>
                <th>Jenis</th>
                <th>Nama_Paket</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($paket as $pk)
                <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $pk->id_outlet }}</td>
                <td>{{ $pk->jenis }}</td>
                <td>{{ $pk->nama_paket }}</td>
                <td>{{ $pk->harga }}</td>
                <td>
                    <!-- Update Data -->
                    <button class="btn edit-paket btn-success" type="button"
                    data-toggle="modal"
                    data-target="#IsiBarang"
                    data-mode="edit"
                    data-id="{{ $pk->id }}"
                    data-id_outlet="{{ $pk->id_outlet }}"
                    data-jenis="{{ $pk->jenis }}"
                    data-nama_paket="{{ $pk->nama_paket }}"
                    data-harga="{{ $pk->harga }}" ><a>UPDATE</a></button>
                    
                    <!-- Delete Data -->
                    <form action="{{ route('paket.destroy', $pk->id) }}" method="POST" style="display: inline">
                     @csrf
                    @method('DELETE')
                    <button class="btn delete-paket btn-danger" type="button">DELETE</button> &nbsp;
                    </form>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- JSQuery -->
<div>
    @if(session('success'))
        <div class="alert alert-success" role="alert" id="success-alert">
            {{ session('success') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" >&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert" id="error-alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{  $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

@include('paket.modal')
@endsection

@include('paket.js')