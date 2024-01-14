
@extends('layouts.app')

@section('title', 'Tambah Article')

@section('content')
    <h2 class="my-4">Tambah Article</h2>
    
    <form action="{{ route('articles.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="nama_produk">Title :</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="harga">Body :</label>
        <input type="text" name="body" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="harga">published_at :</label>
        <input type="date" name="published_at" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Tambah Article</button>
</form>

@endsection


