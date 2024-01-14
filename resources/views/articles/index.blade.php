@extends('layouts.app')

@section('title', 'Daftar Article')

@section('content')

<div class="container mt-4">
<h2 class="mb-4">Daftar Article</h2>

<div class="mb-3">
    <a href="{{ route('articles.create') }}" class="btn btn-primary">Tambah Article</a>

    <form action="{{ route('articles.search') }}" method="GET" class="form-inline float-right">
        <div class="input-group">
            <input type="text" class="form-control" name="cari" placeholder="Cari Artikel..." value="{{ old('cari') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Published_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->body }}</td>
                    <td>{{ $article->published_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning" title="Edit" style="margin-right:5px">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="post" onsubmit="return confirm('Anda yakin ingin menghapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url()->previous() }}" class="btn btn-secondary ml-2">Kembali</a>
</div>
@endsection
