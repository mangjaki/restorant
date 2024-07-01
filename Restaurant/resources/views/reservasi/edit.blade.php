@extends('layout.main')

@section('title','Edit Reservasi')
    
@section('content')
    <div class="container">
        <h1>Edit Reservasi</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="no_meja">Nomor Meja</label>
                <select  name="no_meja" class="form-control" value="{{ $reservasi->no_meja }}" required>
                    <option value="No 1">1</option>
                    <option value="No 2">2</option>
                    <option value="No 3">3</option>
                    <option value="No 4">4</option>
                    <option value="No 5">5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" name="nama" class="form-control" value="{{ $reservasi->nama }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_waktu">Tanggal dan Waktu</label>
                <input type="datetime-local" name="tanggal_waktu" class="form-control" value="{{ $reservasi->tanggal_waktu }}" required>
            </div>
            <div class="form-group">
                <label for="jumlah_orang">Jumlah Orang</label>
                <input type="number" name="jumlah_orang" class="form-control" value="{{ $reservasi->jumlah_orang }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ $reservasi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $reservasi->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ $reservasi->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection