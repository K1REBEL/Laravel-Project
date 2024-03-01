<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'caption','user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function comments()
    {
        return $this->hasMany(Comment::class);

    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    // public function isliked(Post $post)
    // {
    //     // dd($user);
    //         $likeEntry = Like::where('user_id', auth()->id())
    //             ->where('post_id', $post->id)
    //             ->first();

    //             // dd($followerEntry);
    //         if($likeEntry){
    //             return true;
    //         }else{ return false; }
        
    // }
    public function isliked()
    {
        // dd($user);
            $likeEntry = Like::where('user_id', auth()->id())
                ->where('post_id', $this->id)
                ->first();

                // dd($followerEntry);
            if($likeEntry){
                return true;
            }else{ return false; }
        
    }
    public function hashtag()
    {
        return $this->hasMany(Hashtag::class);

    }
    public function media()
    {
        return $this->hasMany(Media::class);

    }
    public function savedpost()
    {
        return $this->belongsTo(Savedpost::class);

    }

}
