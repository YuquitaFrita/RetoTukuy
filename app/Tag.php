<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Salvando datos en forma de array
    protected $fillable = [
        'name', 'slug'
    ];

    //Relación con las posts
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
