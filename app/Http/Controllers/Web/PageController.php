<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;

class PageController extends Controller
{
    //Creación del método commerce
    public function commerce()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));
    }

    //Método busqueda por Categoria
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->pluck('id')->first();
        $posts = Post::where('category_id', $category)
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    //Método busqueda por Etiqueta
    public function tag($slug)
    {
        $posts = Post::whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    //Creación del método post
    public function post($slug)
    {
        //Busqueda del post
        $post = Post::where('slug', $slug)->first();

        //Se pasa el post despues de encontrarlo
        return view('web.post', compact('post'));
    }
}
