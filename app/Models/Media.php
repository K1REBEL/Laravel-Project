<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id', 'url',
    ];
    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}
