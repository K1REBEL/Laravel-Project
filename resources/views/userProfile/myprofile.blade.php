<!DOCTYPE html>
<html lang="en">

    <head>
        <title>profile</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        @extends('layouts.StyleProfile')
        <style>
            .profile-settings-btn {
                font-size: 2rem;
                margin-left: 1rem;
            }
        </style>
    </head>

    <body>

        <!-- ---------------------------------------------header profile---------------------------------->

        <header>
            <!-- start of profile container -->
            <div class="container">
                <!-- start of profile section -->
                <div class="profile">

                    <div class="profile-image">
                        @if($user->profile_photo_path==null)
                            <img src="{{$user->profile_photo_url}}" class="avatar rounded-circle img-thumbnail" alt="avatar">
                        @else
                            <img src="{{asset('storage/'.$user->profile_photo_path)}}" class="avatar rounded-circle img-thumbnail" alt="avatar">
                        @endif
                    </div>

                    <div class="profile-user-settings">

                    <h1 class="profile-user-name">{{$user->user_handle}}</h1>
                    <a href="{{route('users.edit', $user->id)}}" class="btn profile-edit-btn">Edit Profile</a>

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
                            {{-- <li><span class="profile-stat-count">{{$post_count}}</span> posts</li> --}}
                            {{-- <li><span class="profile-stat-count"></span> followers</li>
                            <li><span class="profile-stat-count"></span> following</li> --}}
                        </ul>

                    </div>

                    <div class="profile-bio">

                    <p><span class="profile-real-name">{{$user->name}}</span> {{$user->bio}}</p>

                    </div>

                </div>
                <!-- End of profile section -->

            </div>
            <!-- End of profile container -->

        </header>

    <!-----------------------------------------gallery------------------------------------------------->

        <main>
            <!-- start of gallery container -->
            <div class="container">
                <!-- start of gallery section -->
                <div class="gallery">

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop"
                        class="gallery-image" alt="">

                        <div class="gallery-item-info">

                            <ul>

                                <li class="gallery-item-likes"><span class="visually-hidden"></span><i class="far fa-heart"
                                aria-hidden="true"></i> 56</li>

                                <li class="gallery-item-comments"><span class="visually-hidden"></span><i
                                class="far fa-comment" aria-hidden="true"></i> 2</li>

                                <li class="gallery-item-save"><span class="visually-hidden"></span><i
                                class="far fa-bookmark" aria-hidden="true"></i></li>

                            </ul>

                        </div>



                    </div>
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

                    <i class="fas fa-times exit-icon" onclick="hidePopup()"></i>
                    <img class="popup-image" src="" alt="Popup Image">

                    <div class="popup-icons">
                        <i class="far fa-heart" onclick="toggleIconFill(this)"></i>
                        <i class="far fa-comment" onclick="toggleIconFill(this)"></i>
                        <i class="far fa-bookmark" onclick="toggleIconFill(this)"></i>
                    </div>

                    <div class="popup-caption"></div>
                    <div class="popup-comments"></div>

                </div>

            </div>
            <!-- end of popup container -->
        </div>
        <!-- end of container -->

    <!-- ---------------------------------------------popupJS--------------------------------------->
    @extends('layouts.PopupJS')
    </body>
</html>
