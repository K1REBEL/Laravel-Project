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
    public function User ()
    {
        return $this->belongsTo(User::class);
        
    }
    public function Comment ()
    {
        return $this->hasMany(Comment::class);
        
    }
    public function Like ()
    {
        return $this->hasMany(Like::class);
        
    }
    public function Hashtag ()
    {
        return $this->hasMany(Hashtag::class);
        
    }
    public function Media ()
    {
        return $this->hasMany(Media::class);
        
    }

}
