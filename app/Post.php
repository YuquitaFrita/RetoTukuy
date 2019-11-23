<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Salvando datos en forma de array
    protected $fillable = [
        'user_id', 'category_id', 'name', 'slug', 'district', 'excerpt', 'body', 'status', 'file'
    ];

    //Relación con los usuarios
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relación con las categorias
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relación con las etiquetas
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
