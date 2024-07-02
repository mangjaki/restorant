@extends('layout.main')


@section('title','Payment')
    
@section('content')
<<div class="container">
    <h1>Bayar Pesanan</h1>
    <p>ID Pesanan: {{ $order->id }}</p>
    <p>Menu: {{ $order->orderDetails->pluck('menu.nama')->join(', ') }}</p>
    <p>Total Harga: {{ $order->orderDetails->sum('total_price') }}</p>
    <form action="{{ route('order.process', ['order' => $order->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="payment_method">Metode Pembayaran</label>
            <input type="text" name="payment_method" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="transaction_id">ID Transaksi</label>
            <input type="text" name="transaction_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
    </form>
</div>
@endsection