<!DOCTYPE html>
<html lang="en">

<head>
    <title>profile</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    @extends('layouts.StyleProfile')
    <style>

        /* //////////////////buttons/////////////// */
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 0rem;
            margin-left: 30%;
            /* margin-right: 20%; */
            margin-right: -35%;
        }
        .follow-btn,
        .block-btn {
            text-align: center;
            background-color: #04AA6D;
            border: none;
            color: white;
            padding: 10px 30px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
            margin-right: -32px;
            width: 120px;
        }
        .follow-btn{
            /* margin-left: 20px */
        }
        .follow-btn:hover {
            background-color: #047049;
        }

        .block-btn {
            background-color: gray;
        }

        .block-btn:hover {
            background-color: #CD5C5C;
        }
        .buttoncontainers{
            align-self: flex-end;
            margin-left: 300px;
        }
    </style>
</head>

<body>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<!-- ---------------------------------------------header profile---------------------------------->
<header>
    <!-- start of profile container -->
    <div class="container">
        <!-- start of profile section -->    
        <div class="profile">

            <div class="profile-image">
                @if($user->profile_photo_path==null)
                    <img src="{{$user->profile_photo_url}}" class="avatar rounded-circle img-thumbnail" alt="avatar"  style="width: 150px; height: 150px;">
                @else
                    <img src="{{asset('storage/'.$user->profile_photo_path)}}" class="avatar rounded-circle img-thumbnail" alt="avatar"  style="width: 150px; height: 150px;">
                @endif
            </div>

            <div class="profile-user-settings namebutooncontainer">
                <h1 class="profile-user-name">{{ $user->user_handle }}</h1>
                <div class="d-flex buttoncontainers  " >
                <div class="button-container d-block">

                    @if (Auth::user()->id != $user->id)
                        {{--{{ info($user) }}--}}
                        @if (!Auth::user()->isFollowing($user))
                        {{--{{ info($user->isFollowing($user)) }}--}}
                            <form action="{{ route('users.follow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="follow-btn">Follow</button>
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="follow-btn">Unfollow</button>
                            </form>
                        @endif
                    @endif
                    </div>
                    <div class="button-container d-block">
                        @if (Auth::user()->id != $user->id)
                            @if (!Auth::user()->blocks->contains($user))
                                <form action="{{ route('users.block', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block-btn">Block</button>
                                </form>
                            @else
                                <form action="{{ route('users.unblock', $user->id) }}" method="POST">
                                    @csrf
                                    <button  type="submit" class="block-btn">Unblock</button>
                                </form>
                            @endif
                        @endif
                    </div>   
                     </div>
            </div>

            

            <div class="profile-name">
                <p class="profile-real-name">{{$user->name}}</p>
            </div>

            <div class="profile-stats">

                <ul>
                    @if(isset($post_count))
                    <li><span class="profile-stat-count">{{$post_count}}</span> posts</li>
                @endif
                                            @if(isset($follower_count))
                    <li><span class="profile-stat-count">{{$follower_count}}</span> followers</li>
                @endif
                                            @if(isset($following_count))
                    <li><span class="profile-stat-count">{{$following_count}}</span> followings</li>
                @endif
                </ul>

            </div>


            <div class="profile-bio">
                <p class="bio">{{$user->bio}}yedrdrtdyf</p>
            </div>

            <div class="profile-website">
                <p class="website">{{$user->website}}dhrfhdhf</p>
            </div>


        </div>
        <!-- End of profile section -->

        <!-- -----------------------follow/block------------------------------------ -->

    </div>
    <!-- End of profile container -->

</header>

    <!-----------------------------------------gallery------------------------------------------------->
    <main>
        <!-- start of gallery container -->
        <div class="container">
            <!-- start of gallery section -->
            <div class="gallery" class="photo-container">
                @foreach(json_decode($jsonData) as $index => $post)
                    <div class="gallery-item" tabindex="0"  onclick="displayPopup({{ json_encode($post->media_urls) }})">
                        @foreach($post->media_urls as $media_url)
                            {{info($post->media_urls)}}
                        <img src="{{asset('storage/'.$media_url)}}"
                        class="gallery-image" alt="">
                        @break
                        @endforeach
                    <div class="gallery-item-info">

                        <ul>

                                <li class="gallery-item-likes"><span class="visually-hidden"></span><i class="far fa-heart"
                                aria-hidden="true"></i> {{$post->like_count}}</li>

                                <li class="gallery-item-comments"><span class="visually-hidden"></span><i
                                class="far fa-comment" aria-hidden="true"></i> {{$post->comment_count}}</li>

                                <li class="gallery-item-save"><span class="visually-hidden"></span><i
                                class="far fa-bookmark" aria-hidden="true"></i></li>

                        </ul>

                    </div>

                </div>
                @endforeach

                </div>
                    <!-- end of gallery section -->
                </div>
                <!-- end of gallery container -->
            </main>

    <!-----------------------------------------popup------------------------------------------------->

       <!-- start of container -->
    <div class="container">
        <!-- start of popup container -->
        <div class="popup-container">
                <div class="popup-content">
                    <div class="popup-images">
                        @foreach($post->media_urls as $index => $media_url)
                            <img class="popup-img " src="{{ asset('storage/'.$media_url) }}" />
                        @endforeach
                    </div>
                    
                    <div class="navigation-arrows">
                        <button class="prev-arrow" onclick="changeImage(-1)">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="next-arrow">
                            <i class="fas fa-chevron-right"onclick="changeImage(1)"></i>
                        </button>
                    </div>
                </div>
                <i class="fas fa-times exit-icon" onclick="hidePopup()"></i>
                <!-- popup details -->
                <div class="popup-details">
                    <div class="popup-icons">
                        <i class="far fa-heart" onclick="toggleIconFill(this)"></i>
                        <i class="far fa-comment" onclick="toggleIconFill(this)"></i>
                        <i class="far fa-bookmark" onclick="toggleIconFill(this)"></i>
                    </div>
                    <div class="popup-caption"></div>
                    <div class="popup-comments"></div>
                </div>
            </div>
        </div>
    </div>
  
<!-- end of container -->
    <!-- ---------------------------------------------popupJS--------------------------------------->
    @extends('layouts.PopupJS')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </body>
</html>
