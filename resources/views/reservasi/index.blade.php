@extends('layout.main')

@section('title','Reservasi')
    
@section('content')
<div class="container">
    <h1>Reservasi Saya</h1>
    <a href="{{ route('reservasi.create') }}" class="btn btn-primary">Buat Reservasi Baru</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($reservasi->isEmpty())
        <p class="mt-3">Tidak ada reservasi.</p>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th class="text-center">Nomor Meja</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">Tanggal dan Waktu</th>
                    <th class="text-center">Jumlah Orang</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasi as $reservation)
                    <tr>
                        <td class="text-center">{{ $reservation->no_meja }}</td>
                        <td class="text-center">{{ $reservation->nama }}</td>
                        <td class="text-center">{{ $reservation->tanggal_waktu }}</td>
                        <td class="text-center">{{ $reservation->jumlah_orang }}</td>
                        <td class="text-center">{{ $reservation->status }}</td>
                        <td class="text-center">
                            <a href="{{ route('reservasi.show', $reservation->id) }}" class="btn btn-info btn-sm">Detail</a>
                            @can('update', $reservation)
                                <a href="{{ route('reservasi.edit', $reservation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endcan
                            @can('delete', $reservation)
                                <form action="{{ route('reservasi.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection