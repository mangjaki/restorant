@extends('layout.main')

@section('title', 'SCAN MENU')
    
@section('content')
<style>
    .qr-code-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }
    .img-fluid {
        max-width: 100%;
        height: 250px;
    }
</style>
<div class="container">
    <h1 class="text-center mb-12">Scan QR Code to View Menu</h1>
    <h1 class="text-center"> </h1>
    <div class="qr-code-container">
        <a href="{{ route('menu.index') }}"><img src="{{ asset($qrCodePath) }}" alt="QR Code" class="img-fluid"></a>
    </div>
</div>
@endsection