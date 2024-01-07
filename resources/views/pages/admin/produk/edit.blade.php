@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid rounded bg-white p-3">
        <div class="mb-2 ">
            <a class="btn btn-dark" href="{{ route('admin/menu.index') }}"><i class="bi bi-arrow-left"></i></a>
        </div>
        <form class="w-75 mt-3" method="POST" action="{{ route('admin/menu.update', $menu) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3 w-50">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-select" id="inputGroupSelect01" name="category_id">
                    <option value="">Pilih Kategori</option>
                    @foreach ($category as $categories)
                        <option value="{{ $categories->id }}">{{ $categories->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 w-50">
                <label for="nama" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $menu->nama }}">
            </div>
            <div class="mb-3 w-50">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $menu->harga }}">
            </div>
            <div class="mb-3 w-50">
                <label for="image" class="form-label">Gambar Menu</label>
                <input type="hidden" name="oldImage" value="{{ $menu->image }}">
                @if ($menu->image)
                    <img src="{{ asset('storage/' . $menu->image) }}" class="img-preview img-fluid mb-3 col-sm-2">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-2">
                @endif
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
