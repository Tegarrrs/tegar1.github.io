@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid rounded bg-white p-3">
        <div class="mb-2 ">
            <a class="btn btn-dark" href="{{ route('produk.index') }}"><i class="bi bi-arrow-left"></i></a>
        </div>
        <form class="w-75 mt-3" method="POST" action="{{ route('produk.store') }}" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3 w-50">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-select" id="inputGroupSelect01" name="category_id">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 w-50">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" required
                    value="{{ old('nama') }}">
            </div>
            <div class="mb-3 w-50">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" required
                    value="{{ old('harga') }}">
            </div>
            <div class="mb-3 w-50">
                <label for="stok" class="form-label">stok</label>
                <input type="text" class="form-control" id="stok" name="stok" required
                    value="{{ old('stok') }}">
            </div>
            <div class="mb-3 w-50">
                <label for="image" class="form-label">Gambar Produk</label>
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

    <script>
        function previewImage() {

            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
