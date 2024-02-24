<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'website','gender','user_id',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);

    }
}
