@extends('layout.main')

@section('title','Buat Pemesanan')
    
@section('content')
<div class="container">
    <h1>Buat Pesanan</h1>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div id="menus">
            <div class="menu-item">
                <div class="form-group">
                    <label for="menu_id">Menu</label>
                    <select name="menu[0][menu_id]" class="form-control" required>
                        @foreach($menu as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->nama }} - {{ $menu->harga }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="menu[0][jumlah]" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="add-menu">Tambah Menu</button>
        <button type="submit" class="btn btn-primary">Pesan</button>
    </form>
</div>

<script>
document.getElementById('add-menu').addEventListener('click', function() {
    const menuCount = document.querySelectorAll('.menu-item').length;
    const newMenu = document.querySelector('.menu-item').cloneNode(true);
    newMenu.querySelectorAll('select, input').forEach(input => {
        input.name = input.name.replace(/\d+/, menuCount);
    });
    document.getElementById('menus').appendChild(newMenu);
});
</script>
@endsection