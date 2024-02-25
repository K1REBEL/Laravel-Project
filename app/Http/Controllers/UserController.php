<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function follow(User $user)
    {
        if ($user->id === auth()->id()) {
            throw ValidationException::withMessages(['error' => 'You cannot follow your own profile.']);
        }
        auth()->user()->following()->attach($user->id);
        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return redirect()->back();
    }

    public function isFollowing(User $user)
    {
        return $this->following()->where('followed_id', $user->id)->exists();
    }
}
