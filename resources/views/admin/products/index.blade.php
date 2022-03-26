@extends('layouts.admin.app')
@section('titles', 'List Produk')
@section('maincontent')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Produk </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Produk</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <img src="{{asset($product->image)}}" alt="{{$product->name}}" width="100px" height="100px">
                    </td>
                    <td>
                        <p>{{$product->name}}</p>
                        <p>Kategori : <span class="badge badge-info">{{$product->category->name}}</span></p>
                        <p>Berat : <span class="badge badge-info">{{$product->massa}}</span></p>
                    </td>
                    <td>@currency($product->price)</td>
                    <td>{{date('d M Y', strtotime($product->created_at))}}</td>
                    <td>
                        <p class="{{Str::lower($product->status) == 'aktif' ? 'badge badge-success' : 'badge badge-secondary'}}">{{$product->status}}</p>
                    </td>
                    <td>
                        <a href="{{route('admin.products.edit', ['id' => $product->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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

@foreach($products as $product)
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
            <form action="{{route('admin.products.destroy', ['id' => $product->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach
