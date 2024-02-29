<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//       $posts = Post::with('comments','likes','hashtag','media','user')->get();
        $user = auth()->user();
        $followingIds = $user->following()->pluck('users.id');
        $posts = Post::whereIn('user_id', $followingIds)->orWhere('user_id', $user->id)
            ->with(['comments' => function ($query) {
                $query->with(['user' => function ($query) {
                    $query->select('id', 'user_handle', 'profile_photo_path'); // Select only the avatar URL
                }]); // Eager load user's profile (including avatar)
            },'likes','hashtag','media','user'])
            ->get();
        // $posts = Post::whereIn('user_id', $followingIds)->orWhere('user_id', $user->id)
        //     ->with('comments','likes','hashtag','media','user')
        //     ->get();
        log::info($posts);
       $filteredPosts = collect($posts)->map(function ($post) {
        return [
            'id' => $post->id,
            'caption' => $post->caption,
            'updated_at' => $post->updated_at,
            'comments' => $post->comments->sortByDesc('updated_at'),
            'comment_count' => $post->comments->count(),
            'like_count' => $post->likes->count(),
            'hashtag_names' => $post->hashtag->pluck('name'),
            'media_urls' => $post->media->pluck('url'),
            'user_id' => $post->user->id,
            'user_handle' => $post->user->user_handle,
            'profile_photo_url' => $post->user->profile_photo_url,
            'profile_photo_path' =>$post->user->profile_photo_path
        ];
    });
    //    return response()->json($filteredPosts);
   //  $jsonData = $filteredPosts->toJson();
    // $view = view('users.home')->with('data', $filteredPosts);
   //  return view('users.home',compact('jsonData'));
    // return $view;
    // log::info($Posts);
    $jsonData = $filteredPosts->toJson();
    return view('user.home-page', compact('jsonData','user'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('userProfile.createpost');

        $users = auth()->id();
        return view('userProfile.createpost',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Media $media)
    {
        // Log::info('hello');
        $userId = auth()->id();
        $post = Post::create([
            'caption' => $request->caption,
            'user_id' => $userId,
        ]);
//        $path = $request->file('images');
//        $url = $request->file('images')->storeAs('posts',$path,'public');
//        $media->image=$url;
//        $media->save();
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $path = $image->store('posts', 'public');
                $media = new Media();
                $media->url = $path;
                $media->post_id = $post->id;
                $media->save();
            }
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findorfail($id);
        $posts = Post::with('comments', 'likes', 'hashtag', 'media', 'user')
            ->where('user_id', $id) // Add the WHERE condition
            ->get();
        $filteredPosts = collect($posts)->map(function ($post) {
         return [
             'id' => $post->id,
             'caption' => $post->caption,
             'updated_at' => $post->updated_at,
             'comments' => $post->comments->sortByDesc('updated_at'),
             'comment_count' => $post->comments->count(),
             'like_count' => $post->likes->count(),
             'hashtag_names' => $post->hashtag->pluck('name'),
             'media_urls' => $post->media->pluck('url'),
             'user_id' => $post->user->id,
             'user_handle' => $post->user->user_handle,
             'profile_photo_url' => $post->user->profile_photo_url,
             'profile_photo_path' =>$post->user->profile_photo_path
         ];
     });
     $jsonData = $filteredPosts->toJson();
     return view('userProfile.myprofile', compact('jsonData', 'user'));
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

    public function like(Post $post)
    {
        $post->likes()->create(['user_id' => auth()->id()]);
        return response()->json(['message' => 'Post liked successfully']);
    }

    public function unlike(Post $post)
    {
        $post->likes()->where('user_id', auth()->id())->delete();
        return response()->json(['message' => 'Post unliked successfully']);
    }

    public function comments(Request $request ,  Post $post , User $user)
    {
        $userId = auth()->id();
        $postId = $post->id;
        $path = $user->profile_photo_path;
        $url = $user->profile_photo_url;
        Comment::create([
            'comment' => $request->comment,
            'post_id' => $postId,
            'user_id' => $userId,
        ]);
        return redirect()->route('posts.index');

    }
}
