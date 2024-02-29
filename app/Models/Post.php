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
    public function isliked(User $user)
    {
        // dd($user);
            $followerEntry = Follower::where('followed_id', auth()->id())
                ->where('follower_id', $user->id)
                ->first();

                // dd($followerEntry);
            if($followerEntry){
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

}
