@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Sejarah</h2>

        <form action="{{ route('sejarah.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>

            <div class="form-group">
                <label for="konten">Konten:</label>
                <textarea class="form-control" id="konten" name="konten" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('sejarah.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
