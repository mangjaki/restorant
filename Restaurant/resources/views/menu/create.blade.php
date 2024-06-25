@extends('layout.main')

@section('title','Tambah Menu')
    
@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Form Tambah Menu</div>
            <hr>
            <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Menu</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Menu">
                    @error('nama')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Menu</label>
                    <select class="form-control" id="jenis" name="jenis" placeholder="Masukan Jenis Menu">
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                    @error('jenis')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan Harga Menu">
                    @error('harga')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url_menu">Harga</label>
                    <input type="file" class="form-control" id="url_menu" name="url_menu">
                    @error('url_menu')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-light px-3"><i class="icon-lock"></i>Simpan</button>
                    <a href="{{ url('menu') }}" class="btn btn-light px-3">Batal</a>
                </div>
                {{-- <div class="form-group">
                    
                </div> --}}
            </form>
        </div>
    </div>
</div>
@endsection