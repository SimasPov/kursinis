<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Post $post) {
        if(Auth::check())
            Comment::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
                'body' => request('body')
            ]);
        else return view('pages.restrict');

        return back();
    }
}