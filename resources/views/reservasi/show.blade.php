@extends('layout.main')

@section('title','Detail Reservasi')

@section('content')
<div class="container">
    <h1>Detail Reservasi</h1>
</br>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <p><strong>Nomor Meja : </strong> {{ $reservasi->no_meja }}</p>
                    <p><strong>Nama Pelanggan : </strong> {{ $reservasi->nama }}</p>
                    <p><strong>Tanggal dan Waktu : </strong> {{ $reservasi->tanggal_waktu }}</p>
                    <p><strong>Jumlah Orang : </strong> {{ $reservasi->jumlah_orang }}</p>
                    <p><strong>Status : </strong> {{ $reservasi->status }}</p>
                    <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection