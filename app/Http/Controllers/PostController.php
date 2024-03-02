<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Media;
use App\Models\Savedpost;
use App\Models\Hashtag;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;



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
            ->with([
                'comments' => function ($query) {
                    $query->with(['user' => function ($query) {
                        $query->select('id', 'user_handle', 'profile_photo_path');
                    },
                    'likes' => function ($query) {
                        $query->select('id','user_id', 'post_id', 'comment_id');
                    }])
                    ->withCount('likes');
                },'likes', 'hashtag', 'media', 'user'])
            ->get();
        $filteredPosts = collect($posts)->map(function ($post) {
            $timeSinceUpdate = Carbon::parse($post->updated_at)->diffForHumans();
            return [
                'id' => $post->id,
                'caption' => $post->caption,
                'updated_at' => $post->updated_at,
                'time_since_update' => $timeSinceUpdate,
                'comments' => $post->comments->sortByDesc('updated_at'),
                'comment_count' => $post->comments->count(),
                'like_count' => $post->likes->count(),
                'is_liked' => $post->isliked(),
                'is_saved' => $post->is_saved(),
                'hashtags' => $post->hashtag->pluck('hashtag'),
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
    return view('user.home-page', compact('jsonData', 'user'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('userProfile.createpost');

        $users = auth()->id();
        return view('userProfile.createpost', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request, Media $media)
    // {
    //     $userId = auth()->id();
    //     $post = Post::create([
    //         'caption' => $request->caption,
    //         'user_id' => $userId,
    //     ]);
    //     $ready_hashtags = [];
    //     if ($request->hashtag) {
    //         $pieces = explode(' ', $request->hashtag);
    //         foreach ($pieces as $piece) {
    //             $ready_hashtags[] = '#' . $piece;
    //             $last = end($ready_hashtags);
    //             $hash = new Hashtag();
    //             // $hash->hashtag = $piece;
    //             $hash->hashtag = $piece;
    //             $hash->post_id = $post->id;
    //             $hash->save();
    //         }
    //     }
    //     if ($request->hasFile('images')) {
    //         $images = $request->file('images');
    //         log::info($images);
    //         foreach ($images as $image) {
    //             // Validate file type and size
    //             $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp', 'image/gif', 'video/mp4', 'video/mov'];
    //             $maxFileSize = 10 * 1024; // 10MB in kilobytes
    //             log::info($image);

    //             if (in_array($image->getMimeType(), $allowedMimeTypes) && $image->getSize() <= $maxFileSize) {
    //                 $path = $image->store('posts', 'public');
    //                 log::info($path);

    //                 $media = new Media();
    //                 $media->url = $path;
    //                 $media->post_id = $post->id;
    //                 $media->save();
    //             } else {
    //                 // Handle invalid file type or size
    //                 // You can redirect back with an error message
    //                 return redirect()->back()->with('error', 'Invalid file type or size.');
    //             }
    //         }
    //     }
    //     return redirect()->route('posts.index');
    // }

    public function store(Request $request, Media $media)
    {
        // Log::info('hello');
        $userId = auth()->id();
        $post = Post::create([
            'caption' => $request->caption,
            'user_id' => $userId,
        ]);
        $ready_hashtags = [];
        if($request->hashtag){
            $pieces = explode(' ', $request->hashtag);
            foreach ($pieces as $piece) {
                $ready_hashtags[] = '#' . $piece;
                $last = end($ready_hashtags);
                $hash = new Hashtag();
                $hash->hashtag = $piece;
//                $hash->hashtag = $piece;
                $hash->post_id = $post->id;
                // log::info($ready_hashtags);
                $hash->save();
            }
            // $post->hashtag()->attach($ready_hashtags);

        }

        $validator = Validator::make($request->all(), [
            'images.*' => ['required', 'max:40960', 'mimes:jpg,jpeg,png,webp,gif,mp4,mov'], // Ensure each uploaded file is an image and has a maximum size of 2MB
        ]);

        if ($validator->fails()) {  log::info('failed'); return back()->withErrors($validator)->withInput(); }

//        $path = $request->file('images');
//        $url = $request->file('images')->storeAs('posts',$path,'public');
//        $media->image=$url;
//        $media->save();
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            // log::info($images);
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
            ->where('user_id', $id)
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
    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
        $posts = Post::findOrFail($post->id);
        $existingHashtags = Hashtag::where('post_id', $post->id)->pluck('hashtag')->toArray();
        $posts->hashtag = implode(' ', $existingHashtags);
        $existingMedia = Media::where('post_id', $post->id)->get();
        return view('userProfile.editPost', compact('posts', 'existingMedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
        $posts = Post::findOrFail($post->id);
        $posts->caption = $request->caption;
        $posts->save();
        Hashtag::where('post_id', $post->id)->delete();
        $ready_hashtags = [];
        if($request->hashtag){
            $pieces = explode(' ', $request->hashtag);
            foreach ($pieces as $piece) {
                $ready_hashtags[] = '#' . $piece;
                $last = end($ready_hashtags);
                $hash = new Hashtag();
                $hash->hashtag = $last;
                $hash->post_id = $post->id;
//                log::info($ready_hashtags);
                $hash->save();
            }
        }
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            log::info($images);
            foreach ($images as $image) {
                $path = $image->store('posts', 'public');
                $media = new Media();
                $media->url = $path;
                $media->post_id = $post->id;
                $media->save();
            }
        }
        return redirect()->route('users.show',auth()->id());
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function like(Post $post)
    {
        $post->likes()->create(['user_id' => auth()->id()]);
        return redirect()->route('posts.index');
        // return response()->json(['message' => 'Post liked successfully']);
    }

    public function unlike(Post $post)
    {
        $post->likes()->where('user_id', auth()->id())->delete();
        return redirect()->route('posts.index');
        // return response()->json(['message' => 'Post unliked successfully']);
    }

    public function like_comment(Post $post, Comment $comment)
    {
        $comment->likes()->create(['user_id' => auth()->id(), 'post_id' => $post->id]);
        return redirect()->route('posts.index');
        // return response()->json(['message' => 'Post liked successfully']);
    }

    public function unlike_comment(Comment $comment)
    {
        $comment->likes()->where('user_id', auth()->id())->delete();
        return redirect()->route('posts.index');
        // return response()->json(['message' => 'Post unliked successfully']);
    }

    public function comments(Request $request,  Post $post, User $user)
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

    public function savepost(Post $post)
    {
        $postId = $post->id;
        $userId = auth()->id();
        // Log::info($userId);

        $existingSavedPost = Savedpost::where('post_id', $postId)
            ->where('user_id', $userId)
            ->exists();

        if (!$existingSavedPost) {
            Savedpost::create([
                'post_id' => $post->id,
                'user_id' => $userId,
            ]);
        } else { return redirect()->route('posts.index'); }
        return redirect()->route('posts.index');
    }

    public function unsavepost(Post $post)
    {
        $postId = $post->id;
        $userId = auth()->id();

        $existingSavedPost = Savedpost::where('post_id', $postId)->where('user_id', $userId);

        if($existingSavedPost){ $existingSavedPost->delete(); }
        return redirect()->route('posts.index');
    }
    public function retreiveSavedposts(){

        $userId = auth()->id();
        // Log::info($userId);

        $savedPosts = Savedpost::where('user_id', $userId)->with('post')->get();
        $formattedSavedPosts = $savedPosts->map(function ($savedPost) {
            return[
                'post_id'=>$savedPost->post->id,
                'caption' => $savedPost->post->caption,
            ];
        });
        return response()->json($formattedSavedPosts);
    }
    public function get_tag($tag_name){
        $posts = Post::whereHas('hashtag', function ($query) use ($tag_name) {
            $query->where('hashtag', $tag_name);
        })->get();
        log::info($posts);
        return response()->json($posts);
    }
}
