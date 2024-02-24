<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    use HasFactory;
    protected $fillable = [
        'followed_user_id','follower_user_id',
    ];
    public function User ()
    {
        return $this->belongsTo(User::class);
        
    }
}
