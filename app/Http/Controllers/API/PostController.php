<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['tags', 'category', 'user'])->orderByDesc('id')->paginate(9);

        return $posts;
    }

    public function show($slug)
    {
        $post = Post::with(['tags', 'category', 'user'])->where('slug', $slug )->first();
        if($post) {
            return $post;
        } else {
            response()->json([
                'status_code' => 404,
                'status_text' => 'not-found'
            ]);
        }

    }
}
