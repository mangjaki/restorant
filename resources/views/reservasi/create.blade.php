@extends('layout.main')

@section('title','Buat Reservasi')
    
@section('content')
<div class="container">
    <h1>Buat Reservasi Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="no_meja">Nomor Meja</label>
            <select id="no_meja" name="no_meja" class="form-control" required>
                <option value="No 1">1</option>
                <option value="No 2">2</option>
                <option value="No 3">3</option>
                <option value="No 4">4</option>
                <option value="No 5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama Pelanggan</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama" required>
            @error('nama')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_waktu">Tanggal dan Waktu</label>
            <input type="datetime-local" id="tanggal_waktu" name="tanggal_waktu" class="form-control" required>
            @error('tanggal_waktu')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="jumlah_orang">Jumlah Orang</label>
            <input type="number" id="jumlah_orang" name="jumlah_orang" class="form-control" required>
            @error('jumlah_orang')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection