@extends('layouts.admin.app')
@section('titles', 'Edit Produk')
@section('maincontent')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Produk </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
        </div>
        <div class="card-body">
            <form action="{{route('admin.products.update', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">-</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{$product->description}}</textarea>
                    @error('description')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
                    @error('price')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="massa">Berat</label>
                    <input type="number" class="form-control" id="massa" name="massa" value="{{$product->massa}}">
                    @error('massa')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">-</option>
                        <option value="draf" {{Str::lower($product->status) == 'draf' ? 'selected' : ''}}>Draf</option>
                        <option value="aktif" {{Str::lower($product->status) == 'aktif' ? 'selected' : ''}}>Aktif</option>
                    </select>
                    @error('status')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection