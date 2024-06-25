@extends('layout.main')

@section('title', 'MENU')
    
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Menu Restoran</title>
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <style>
        .card-img-top {
            width: 100%;
            height: 300px; /* Sesuaikan dengan tinggi yang diinginkan */
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Daftar Menu</h1>
        <a href="{{ route('menu.create') }}" class="btn btn-primary col-lg-3">Tambah Menu</a>
        <hr>
        <div class="row">
            @foreach($menu as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ url('fotomenu/'. $item['url_menu']) }}" class="card-img-top" width="10px">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $item['nama'] }}</h5>
                            <p class="card-text text-center">{{ $item['jenis'] }}</p>
                            <p class="card-text text-center">{{ $item['harga'] }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('menu.edit', $item['id']) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('menu.destroy', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm show_confirm">Delete</button>
                                </form>
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