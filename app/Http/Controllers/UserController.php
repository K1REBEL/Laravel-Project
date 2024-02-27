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
            Log::info(auth()->id());
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
        //
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
