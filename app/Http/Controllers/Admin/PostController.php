<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Author;
use App\Models\Tag;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ordinamento dal più recente
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5);

        return view ('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate(
            [
                'title' => 'required'
            ]
        );

        $data = $request->all();
        $user = Auth::user();

        $new_post = new Post();

        if (array_key_exists('image', $data)) {
            $img_path = Storage::put('post_images', $data['image']);
            $data['image'] = $img_path;
        }

        $new_post->fill($data);
        $new_post->slug = Str::slug($new_post->title, '-');

        $new_post->save();

        // se ci sono delle key dei tag
        if ( array_key_exists('tags', $data) ) {
            $new_post->tags()->attach($data['tags']);
        }

        // Invio mail
        $mail = new SendNewMail();
        Mail::to('francesod95@gmail.com')->send($mail);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $authors = Author::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'tags', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        if (array_key_exists('image', $data)) {
            // rimuove l'immagine che sta per essere sostituita
            if ($post->image) Storage::delete($post->image);

            $img_path = Storage::put('post_images', $data['image']);
            $data['image'] = $img_path;
        }

        $post->slug = Str::slug($request->title, '-');
        $post->update($data);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Elimina l'immagine prima di eliminare il post
        if ($post->image) Storage::delete($post->image);

        $post->delete();
        return redirect()->route( 'admin.posts.index' )
                         ->with('message', "Il post $post->title è stato eliminato con successo.");
    }
}
