@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid rounded bg-white p-3">
        <div class="mb-2">
            <a class="btn btn-dark" href="{{ route('admin/category.index') }}"><i class="bi bi-arrow-left"></i></a>
        </div>
        <form class="w-75" method="POST" action="{{ route('admin/category.update', $category) }}">
            @method('PUT')
            @csrf
            <div class="mb-3 w-50">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $category->nama }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
