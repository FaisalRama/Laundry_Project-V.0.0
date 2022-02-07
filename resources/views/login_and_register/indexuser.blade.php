@extends('templates.gentelella')

@section('title-of-content')
    User Management
@endsection

<!-- Member -->
@section('content')

<!-- Tambah Data Member -->
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
                <th>Email</th>
                <th>Password</th>
                <th>Outlet_id</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($user as $u)
                <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->password }}</td>
                <td>{{ $u->outlet_id }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    <!-- Update Data -->
                    <button class="btn edit-member btn-success" type="button"
                    data-toggle="modal"
                    data-target="#IsiBarang"
                    data-mode="edit"
                    data-nama="{{ $u->name }}"
                    data-email="{{ $u->email }}"
                    data-password="{{ $u->password }}"
                    data-outlet_id="{{ $u->outlet_id }}"
                    data-role="{{ $u->role }}" ><a>UPDATE</a></button>
                    
                    <!-- Delete Data -->
                    <form action="{{ route('member.destroy', $u->id) }}" method="POST" style="display: inline">
                     @csrf
                    @method('DELETE')
                    <button class="btn delete-member btn-danger" type="button">DELETE</button> &nbsp;
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
        <div class="alert alert-danger" role="alert" id="error-alert2 ">
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

@include('member.modal')
@endsection

@include('member.js')