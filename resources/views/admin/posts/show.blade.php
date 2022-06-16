@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{ $post->title }}</h2>
        <h5 class="text-center mb-3">
            <em>{{ $post->Author->name }} {{ $post->Author->surname }}</em>
        </h5>
        <img class="mx-auto mb-3 d-block" src="{{ asset("storage/$post->image") }}" alt="{{ $post->title }} Image" width="50%">
        <p class="text-center mb-3">{{ $post->content }}</p>
        <h3 class="d-inline-block">Tags:</h3>
        @forelse ($post->tags as $tag)
            <span class="p-1 rounded-pill" style="background-color: {{ $tag->color }}; color: white;">
                {{ $tag->label }}
            </span>
        @empty
            <h5>Nessun tag</h5>
        @endforelse

        @include('includes.deletePost')
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/deleteConfirmation.js') }}"></script>
@endsection