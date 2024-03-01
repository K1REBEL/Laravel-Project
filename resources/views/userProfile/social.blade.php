@extends('layouts.main')

@include('includes.navbar')
@extends('layouts.Stylehome')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')

<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="followers-tab" data-toggle="tab" href="#followers" role="tab"
                aria-controls="followers" aria-selected="true">Followers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="following-tab" data-toggle="tab" href="#following" role="tab"
                aria-controls="following" aria-selected="false">Following</a>
        </li>
        @if(isset($blocked))
        <li class="nav-item">
            <a class="nav-link" id="blocked-tab" data-toggle="tab" href="#blocked" role="tab" aria-controls="blocked"
                aria-selected="false">Blocked</a>
        </li>
        @endif
    </ul>


    <!-- =======================start followers============= -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active" id="followers" role="tabpanel" aria-labelledby="followers-tab">
            @foreach($followers as $follower)
            <div class="flex items-center justify-between mt-14 ml-10">
                <img class="h-16 rounded-full border p-[2px]"
                    src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                <div class="flex-1 ml-4">
                    <h2 class="font-bold">ID: {{$follower->id}}</h2>
                    <h2 class="font-bold">{{$follower->user_handle}}</h2>
                </div>
                <div class="flex items-center">
                    

                        @if (Auth::user()->id != $follower->id)
                        {{--{{ info($user) }}--}}
                            <div class="button-container">
                                
                                @if (!Auth::user()->isFollowing($follower))
                                    {{--{{ info($user->isFollowing($user)) }}--}}
                                    <form action="{{ route('users.follow', $follower->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="follow-btn">Follow Back</button>
                                    </form>
                                @else
                                    <form action="{{ route('users.unfollow', $follower->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="follow-btn">Unfollow</button>
                                    </form>
                                @endif
                            </div>
                            
                            <div class="button-container">
                                    @if (!Auth::user()->blocks->contains($follower))
                                        <form action="{{ route('users.block', $follower->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="block-btn">Block</button>
                                        </form>
                                    @else
                                        <form action="{{ route('users.unblock', $follower->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="block-btn">Unblock</button>
                                        </form>
                                    @endif
                            </div>  
                        @elseif (Auth::user()->id == $follower->id)
                                <a href="{{ route('users.show', $follower->id) }}"><button>My Profile</button></a>
                        @endif
                </div>
            </div>
            @endforeach

            <!-- -------------------------------------------------------------------------------- -->
            {{-- <div class="flex items-center justify-between mt-14 ml-10">
                <img class="h-16 rounded-full border p-[2px]"
                    src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                <div class="flex-1 ml-4">
                    <h2 class="font-bold">AhmedMohammed</h2>
                </div>
                <div class="flex items-center">
                    <button type="button" class="btn btn-primary">Remove</button>
                    <button type="button" class="btn btn-danger" style="margin-left: 10px;">Blocked</button>
                </div>
            </div> --}}
        </div>

        <!-- =======================start following============= -->
        <div class="tab-pane show" id="following" role="tabpanel" aria-labelledby="following-tab">
            @foreach($following as $followee)
            <div class="flex items-center justify-between mt-14 ml-10">
                <img class="h-16 rounded-full border p-[2px]"
                    src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                <div class="flex-1 ml-4">
                    <h2 class="font-bold">ID: {{$followee->id}}</h2>
                    <h2 class="font-bold">{{$followee->name}}</h2>
                </div>
                <div class="flex items-center">
                    @if (Auth::user()->id != $followee->id)
                        @if (Auth::user()->isFollowing($followee))
                            <form action="{{ route('users.unfollow', $followee ->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="follow-btn">Unfollow</button>
                            </form>
                        @endif
                    @elseif (Auth::user()->id == $followee->id)
                        <a href="{{ route('users.show', $followee->id) }}"><button>My Profile</button></a>
                    @endif
                    {{-- <button type="button" class="btn btn-primary">following</button>
                    <button type="button" class="btn btn-danger" style="margin-left: 10px;">Blocked</button> --}}
                </div>
            </div>
            @endforeach
        </div>

        @if(isset($blocked))
        <!-- =======================start blocked============= -->
        <div class="tab-pane show" id="blocked" role="tabpanel" aria-labelledby="blocked-tab">
            @foreach($blocked as $blocked_user)
            <div class="flex items-center justify-between mt-14 ml-10">
                <img class="h-16 rounded-full border p-[2px]"
                    src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                <div class="flex-1 ml-4">
                    <h2 class="font-bold">{{$blocked_user->user_handle}}</h2>
                </div>
                <div class="flex items-center">
                    <div class="button-container">
                        @if (Auth::user()->id != $blocked_user->id)
                            @if (Auth::user()->blocks->contains($blocked_user))
                                <form action="{{ route('users.unblock', $blocked_user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block-btn">Unblock</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
        

        @endif
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @stop