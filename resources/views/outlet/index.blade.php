@extends('templates.gentelella')

@section('title-of-content')
    Outlet
@endsection

<!-- Outlet -->
@section('content')

<!-- Tambah Data Outlet -->
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
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($outlet as $out)
                <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $out->nama }}</td>
                <td>{{ $out->alamat }}</td>
                <td>{{ $out->tlp }}</td>
                <td>
                    <!-- Update Data -->
                    <button class="btn edit-outlet btn-success" type="button"
                    data-toggle="modal"
                    data-target="#IsiBarang"
                    data-mode="edit"
                    data-id="{{ $out->id }}"
                    data-nama="{{ $out->nama }}"
                    data-alamat="{{ $out->alamat }}"
                    data-tlp="{{ $out->tlp }}" ><a>UPDATE</a></button>
                    
                    <!-- Delete Data -->
                    <form action="{{ route('outlet.destroy', $out->id) }}" method="POST" style="display: inline">
                     @csrf
                    @method('DELETE')
                    <button class="btn delete-outlet btn-danger" type="button">DELETE</button> &nbsp;
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
        <div class="alert alert-danger" role="alert">
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

@include('outlet.modal')
@endsection

@include('outlet.js')