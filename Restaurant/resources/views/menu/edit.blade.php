@extends('layout.main')

@section('title','Edit Menu')
    
@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Form Edit Menu</div>
            <hr>
            <form method="POST" action="{{ route('menu.update', $menu['id']) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Menu</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') ? old('nama'): $menu['nama'] }}" placeholder="Masukan Nama Menu">
                    @error('nama')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Menu</label>
                    <select class="form-control" id="jenis" name="jenis" value="{{old('jenis') ? old('jenis'): $menu['jenis'] }}" placeholder="Masukan Jenis Menu">
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                    @error('jenis')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{old('harga') ? old('harga'): $menu['harga'] }}" placeholder="Masukan Harga Menu">
                    @error('harga')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{old('stok') ? old('stok'): $menu['stok'] }}" placeholder="Masukan Stok Menu">
                    @error('stok')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url_menu">Foto</label>
                    <input type="file" class="form-control" id="url_menu" name="url_menu">
                    @error('url_menu')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection