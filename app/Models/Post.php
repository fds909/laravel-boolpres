<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'author_id', 'content', 'image', 'slug'];

    public function Author() {
        return $this->belongsTo('App\Models\Author');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }
}
