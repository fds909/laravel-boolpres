@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Post</h1>

        <form action=" {{ route('admin.posts.update', $post->id) }} " method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title"
                       placeholder="Titolo del post" name="title" value="{{ old('title', $post->title) }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="60" rows="5"
                          placeholder="Scrivi il contenuto del post">
                    {{ old('content', $post->content) }}
                </textarea>
            </div>

            <div class="form-group">
                <label for="image">Image <i class="fa-solid fa-image"></i></label>
                <input type="file" class="form-control-file" placeholder="carica l'immagine"
                         id="image" name="image">
            </div>
    
            <button type="submit" class="btn btn-warning">Edit</button>
        </form>
    </div>
@endsection
