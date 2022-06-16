<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'surname', 'gender'];

    public function Post() {
        return $this->hasMany('App\Models\Post');
    }
}
