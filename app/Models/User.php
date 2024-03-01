<?php

namespace App\Models;

use App\Models\Follower;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'user_handle',
        'phone',
        'bio',
        'website',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
    * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
//    public function getNameAttribute()
//    {
//        return $this->attributes['name'];
//    }

//    protected $appends = [
//        'name',
//    ];
    public function profile()
    {
        return $this->hasOne(Profile::class);

    }
    public function post()
    {
        return $this->hasMany(Post::class);

    }
    // public function followers()
    // {
    //     return $this->hasMany(Follower::class,'followed_id');

    // }
    // public function following()
    // {
    //     return $this->hasMany(Follower::class,'follower_id');

    // }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'follower_id');

    }
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followed_id');

    }
    public function blocks()
    {
        return $this->belongsToMany(User::class, 'blocking', 'user_id', 'blocked_user_id');
    }
    

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isFollowing(User $user)
    {
        // dd($user);
        if(auth()->id() == $user->id){
            return false;
        }
        else{
            $followerEntry = Follower::where('follower_id', auth()->id())
                ->where('followed_id', $user->id)
                ->first();

                // dd($followerEntry);
            if($followerEntry){
                return true;
            }else{ return false; }
        }
        // return !!$this->following()->where('followed_id', $user->id)->exists();
    }
    // public function isFollowing(User $user)
    // {
    //     return $this->following()->where('followed_id', $user->id)->exists();
    // }
    public function savedpost()
    {
        return $this->hasMany(Savedpost::class);

    }

}
