<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function createpost(Request $req)
    {
        $post = new Post;
        $post->username = $req->username;
        $post->textContent = $req->input('textContent');
        $post->imageContent = $req->input('imageContent');
        $post->reacts = $req->input('reacts');
        $post->save();

        if (!$post || (!$post->textContent && !$post->imageContent)) {
            return ["error" => "Please write a content."];
        }
    }

    function displaypost(Request $req)
    {
        $post = Post::whereRaw('id = (select max(`id`) from posts)')->get();

        return $post;
    }
}
