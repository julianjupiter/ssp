<?php

namespace App\Http\Controllers;

use App\Events\PostPublished;
use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return response()->json([
            'status' => 'SUCCES',
            'posts' => Post::all()
        ], 200);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $post = new Post($data);
        try {
            $post->save();
            PostPublished::dispatch($post);
        } catch (Exception $exception) {
            var_dump($exception->getMessage());
            return response()->json(['status' => 'FAILED'], 500);
        }

        return response()->json([
            'status' => 'SUCCESS',
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'description' => $post->description,
                'content' => $post->content,
                'slug' => $post->slug,
                'website' => Website::find($post->website_id),
                'user' => User::find($post->user_id),
                'created_at' => $post->created_at
            ]
        ], 200);
    }
}
