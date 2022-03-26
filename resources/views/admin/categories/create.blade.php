@extends('layouts.admin.app')
@section('titles', 'Tambah Kategori')
@section('maincontent')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kategori </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
        </div>
        <div class="card-body">
            <form action="{{route('admin.categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Parent</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">-</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection