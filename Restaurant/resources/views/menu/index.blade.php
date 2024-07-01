@extends('layout.main')

@section('title', 'MENU')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <style>
        .card-img-top {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .card-text {
            display: flex;
            align-items: center;
        }
        .card-text p {
            margin: 0; /* Menghapus margin default pada elemen <p> */
            padding-left: 5px; /* Opsional, untuk memberi jarak antara teks "Produk:" dan elemen <p> */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Daftar Menu</h1>
        @can('create', App\Menu::class)
            <a href="{{ route('menu.create') }}" class="btn btn-primary col-lg-2">Tambah Menu</a>
        @endcan
        @can('qrCode', App\Menu::class)
            <div>
                <a href="{{ route('menu.qrcode') }}"><img src="{{ url('qrcodes/menu_1.png') }}" alt="QR Code" class="img-fluid mt-3" style="max-width: 50px;"></a>
                <p class="mt-2">Klik Barcode!</p>
            </div>
        @endcan
        <hr>
        <div class="row">
            @foreach($menu as $menu)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('fotomenu/' .$menu['url_menu']) }}" class="card-img-top">
                            <h5 class="card-title text-center">{{ $menu['nama'] }}</h5>
                            <div class="card-text">
                                Produk : <p>{{ $menu['jenis'] }}</p>
                            </div>
                            <div class="card-text">
                                Harga  : <p> {{ $menu['harga'] }}</p>
                            </div>
                            <div class="card-text">
                                Stok   : <p> {{ $menu['stok'] }}</p>
                            </div>
                        </br>
                            <div class="text-center">
                                @can('delete', $menu)
                                    <form action="{{ route('menu.destroy', $menu['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm show_confirm">Hapus</button>
                                    </form>
                                @endcan
                                </br>
                                @can('update', $menu)
                                    <a href="{{ route('menu.edit', $menu['id']) }}" class="btn btn-primary btn-sm col-lg-3">Edit</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ url('js/app.js') }}"></script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
  <script>
    Swal.fire({
    title: "Good job!",
    text: "{{session('success')}}",
    icon: "success"
    });
  </script>
@endif
<!-- confirm dialog -->
<script type="text/javascript">
 
  $('.show_confirm').click(function(event) {
       let form =  $(this).closest("form");
       let name = $(this).data("name");
       event.preventDefault();
       Swal.fire({
         title: " Yakin Mau di hapus? ",
         text: "Data kamu tidak bisa Kembali lagi!",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "iya, Yakin !"
       })
       .then((willDelete) => {
         if (willDelete.isConfirmed) {
           form.submit();
         }
       });
   });

</script>
@endsection