<?php

namespace App\Http\Controllers;

use Illuminate\Http\request;
use Illuminate\Database\Eloquent\Collection;
use App\post;

class PostsMainController extends Controller
{
    public function index() {
        $posts = Post::paginate(10);

        return view('pages.news', compact('posts'));
    }
    public function showPost(Post $post) {

        return view('pages.full-post', compact('post'));
    }
    public function showCat($category) {

        $cats = Post::where('category', '=', $category)->get();

        return view('pages.cat', compact('cats'));
    }
}