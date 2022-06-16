@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1 class="text-center">Posts</h1>

    <div class="container">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">
            Crea Post 
        </a>

        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->title}}</th>
                        <td>
                        @if ($post->Author != null)
                            {{ $post->Author->name }} {{ $post->Author->surname }}
                        @else
                           - 
                        @endif
                        </td>
                        <td>{{ $post->content }}</td>
                        <td><img src="{{ $post->image }}" alt="Post Image" width="50"></td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            <a href="{{ route('admin.posts.show', $post->id) }}"
                                class="btn btn-primary">View</a>
                            <a href=" {{ route('admin.posts.edit', $post->id) }} "
                                class="btn btn-warning">Edit</a>
                            @include('includes.deletePost')
                        </td>
                    </tr>
                @empty
                    <h2 class="text-center">Non c'è nessun post da mostrare</h2>
                @endforelse
                    
            </tbody>
        </table>

        {{-- Pagination --}}
        @if ($posts->hasPages())
            {{ $posts->links() }}
        @endif

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/deleteConfirmation.js') }}"></script>
@endsection