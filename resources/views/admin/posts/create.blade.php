@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea nuovo post</h1>
        
        <form action=" {{ route('admin.posts.store') }} " method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title"
                       placeholder="Titolo del post" name="title">
            </div>

            <div class="form-group">
                <label for="author_id">Author</label>
                <select name="author_id" id="author_id">
                    <option value="">Nessun autore</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }} {{ $author->surname }}</option>
                    @endforeach
                </select>
            </div>

            <hr/>

            <div class="form-group">

            @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}"
                            value="{{ $tag->id }}" name="tags[]">
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->label }}</label>
                </div>
            @endforeach

            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="60" rows="5"
                          placeholder="Scrivi il contenuto del post">
    
                </textarea>
            </div>

            <div class="form-group">
                <label for="image">Image <i class="fa-solid fa-image"></i></label>
                <input type="file" class="form-control-file" placeholder="carica l'immagine"
                         id="image" name="image">
            </div>
    
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection
