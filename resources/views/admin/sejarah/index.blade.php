@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Sejarah</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('sejarah.create') }}" class="btn btn-primary">Tambah Sejarah</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sejarahs as $sejarah)
                    <tr>
                        <td>{{ $sejarah->judul }}</td>
                        <td>{{ $sejarah->konten }}</td>
                        <td>
                            <a href="{{ route('sejarah.show', $sejarah->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('sejarah.edit', $sejarah->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('sejarah.destroy', $sejarah->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
