@extends('layouts.admin.app')
@section('titles', 'List Kategori')
@section('maincontent')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kategori </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Kategori</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Parent</th>
                <th>Created At</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        @if ($category->category_id == null)
                        -
                        @else
                        {{$category->parent->name}}
                        @endif
                    </td>
                    <td>{{date('d M Y', strtotime($category->created_at))}}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{$loop->iteration}}"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$loop->iteration}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection

@foreach($categories as $category)
<div class="modal fade" id="modal-edit-{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-hapus">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <label for="parent">Parent</label>
                    <select name="parent" id="parent" class="form-control">
                        <option value="0">-</option>
                        @foreach($categories as $cat)
                        <option value="{{$cat->id}}" {{$cat->id == $category->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-hapus-{{$loop->iteration}}" tabindex="-1" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-hapus">Hapus</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            Apakah kamu yakin untuk menghapusnya ?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <form action="{{route('admin.categories.destroy', ['id' => $category->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach
