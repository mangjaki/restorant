@extends('layout.main')

@section('title','Dashboard')
    
@section('content')


    <!-- Menambahkan gambar di sini -->
    <div class="text-center">
        <img src=" images/image.png " alt="Gambar Onion Cafe" class="img-fluid">
       
    </div>

    <div class="d-flex justify-content-center">
        <div class="text-center">
            <h1 class="display-3 text-white animated slideInLeft">Welcome to<br>Onion Cafe</h1>
            <p class="text-white animated slideInLeft mb-4 pb-2">Kami adalah tempat makan yang menawarkan pengalaman kuliner terbaik dengan menu yang beragam dan cita rasa yang autentik. Terletak di tengah kota, Restoran Volta menjadi destinasi favorit bagi para pecinta kuliner yang mencari suasana nyaman dan hidangan lezat.</p>
            <a href="{{ route('reservasi.store') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
        </div>
    </div>
    
@endsection
