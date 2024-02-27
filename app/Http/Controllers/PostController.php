<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts = Post::with('comments','likes','hashtag','media','user')->get();
       $filteredPosts = collect($posts)->map(function ($post) {
        return [
            'id' => $post->id,
            'caption' => $post->caption,
            'updated_at' => $post->updated_at,
            'latest_comment' => $post->comments->sortByDesc('updated_at')->first(),
            'comment_count' => $post->comments->count(),
            'like_count' => $post->likes->count(),
            'hashtag_names' => $post->hashtag->pluck('name'),
            'media_urls' => $post->media->pluck('url'),
            'user_id' => $post->user->id,
            'user_handle' => $post->user->user_handle,
            'profile_photo_url' => $post->user->profile_photo_url,
        ];
    });
    //    return response()->json($filteredPosts);
    return view('users.home',compact('filteredPosts'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->id();
        $post = Post::create([

            'caption' =>$request->caption,
            'user_id' => $userId,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id == auth()->id()){
            $post->update([
                'user_id' => $post->user_id,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
