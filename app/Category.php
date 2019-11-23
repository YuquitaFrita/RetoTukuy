<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Salvando datos en forma de array
    protected $fillable = [
        'name', 'slug', 'body'
    ];

    //Relación con los posts
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
