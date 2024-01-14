@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
    <h2 class="my-4">Edit Article</h2>

    <form action="{{ route('articles.update', $article->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Judul :</label>
            <input type="text" name="title" value="{{ $article->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="body">Isi :</label>
            <input type="text" name="body" value="{{ $article->body }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="published_at">Tanggal Publikasi :</label>
            <input type="date" name="published_at" value="{{ $article->published_at }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Artikel</button>
    </form>
@endsection
