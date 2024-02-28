<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->id()) {
            // Log::info(auth()->user());
            $user = User::where('id',auth()->id())->get()->first();
//            return User::where('id',auth()->id())->get();
            return view('userProfile.myprofile',compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->get()->first();
        if ($user->id === auth()->id()) {
            return view('userProfile.myprofile',compact('user'));
        }
            // Log::info(auth()->user());
            
//            return User::where('id',auth()->id())->get();
              return view('userProfile.otherprofile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->id()){
         $user = User::findorfail($id);
        return view('userProfile.edit',compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->id()){
        $users = User::findorfail($id);
        $users->update([
            'email'=> $request->email,
            'name'=> $request->name,
            'phone'=> $request->phone,
            'gender'=> $request->gender,
            'bio'=> $request->bio,
            'website'=>$request->website
        ]);
        return redirect()->route('users.index');
    }}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     public function follow(User $user)
     {
        if ($user->id === auth()->id()) {
            throw ValidationException::withMessages(['error' => 'You cannot follow your own profile.']);
        }
        Log::info('Follow request for user ' . auth()->user()->id . ' to follow user ' . $user->id);
         auth()->user()->following()->attach($user->id);
         return redirect()->back();
     }

     public function unfollow(User $user)
     {
        Log::info('Unfollow request for user ' . auth()->user()->id . ' to unfollow user ' . $user->id);
        // if ($user->id === auth()->id()) {
        //     throw ValidationException::withMessages(['error' => 'You cannot follow your own profile.']);
        // }
         auth()->user()->following()->detach($user->id);
         return redirect()->back();
     }

    // public function isFollowing(User $user)
    // {
    //     log::info('this is invoked');

    //     log::info($user);
    //     return !!$this->following()->where('followed_id', $user->id)->count();
    // }

    //  public function isFollowing(User $user)
    //  {
    //     log::info($user);
    //     Log::info('Checking if user ' . auth()->id() . ' follows user ' . $user->id);
    //     return $this->following()->where('followed_id', $user->id)->exists();
    //  }
    //  public function isFollowing(User $user)
    //  {
    //     return !!$this->following()->where('followed_id', $user->id)->count();
    //  }
}
