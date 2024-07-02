@extends('layout.main')

@section('title','Barcode Pemesanan')
    
@section('content')
<div class="container">
    <h1>Detail Pesanan</h1>
    @foreach($order->orderDetails as $detail)
    <p>Menu: {{ $detail->menu->nama }}</p>
    <p>Jumlah: {{ $detail->jumlah }}</p>
    <p>Harga: {{ $detail->total_price }}</p>
    @endforeach
    <p>Total Harga: {{ $order->orderDetails->sum('total_price') }}</p>
    <p>Status: {{ $order->status }}</p>
    <div>
        <h2>Scan QR Code untuk Membayar</h2>
        <img src="{{ asset($qrCodePath) }}" alt="QR Code">
    </div>
</br>
    <a href="{{ route('order.pay', ['order' => $order->id]) }}" class="btn btn-primary">Bayar Sekarang</a>
</div>
@endsection