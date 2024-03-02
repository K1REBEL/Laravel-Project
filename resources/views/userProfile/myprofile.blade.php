<!DOCTYPE html>
<html lang="en">

    <head>
        <title>profile</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <!-- Include Slick Slider CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
        @extends('layouts.StyleProfile')
        <style>
            .profile-settings-btn {
                font-size: 2rem;
                margin-left: 1rem;
            }
            .photo-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 10px;
            }

            .photo-container img {
                width: 100%;
                height: auto;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .nav {
                margin-bottom:3rem;
           }
#myposts-tab,
#saved-tab{
    font-size:15px;
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
                            <img src="{{$user->profile_photo_url}}" class="avatar rounded-circle img-thumbnail" alt="avatar"  style="width: 150px; height: 150px;">
                        @else
                            <img src="{{asset('storage/'.$user->profile_photo_path)}}" class="avatar rounded-circle img-thumbnail" alt="avatar"  style="width: 150px; height: 150px;">
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

                    <div class="profile-name">
                        <p class="profile-real-name">{{$user->name}}</p>
                    </div>

                    <div class="profile-bio">
                        <p class="bio">{{$user->bio}}</p>
                    </div>

                    <div class="profile-website">
                        <p class="website">{{$user->website}}</p>
                    </div>

                </div>
                <!-- End of profile section -->

            </div>
            <!-- End of profile container -->

        </header>
<!-- ------------------------------------------------tabs-------------------------- -->
<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="myposts-tab" data-toggle="tab" href="#myposts" role="tab" aria-controls="myposts" aria-selected="true">My posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="saved-tab" data-toggle="tab" href="#saved" role="tab" aria-controls="saved" aria-selected="false">Saved</a>
        </li>
    </ul>
</div>
<!-----------------------------------------gallery------------------------------------------------->
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="myposts" role="tabpanel" aria-labelledby="myposts-tab">
    <main>
                <!-- start of gallery container -->
                <div class="container">
                    <!-- start of gallery section -->
                    <div class="gallery" class="photo-container">

                    @foreach(json_decode($jsonData) as $index => $post)
                    <div  class="gallery-item" tabindex="0" onclick="displayPopup({{ json_encode($post->media_urls) }})">
                        @foreach($post->media_urls as $media_url)
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
    </div>
    
<!-- ------------------------------------------------------------------------------ -->
<div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
       <main>
                <!-- start of gallery container -->
                <div class="container">
                    <!-- start of gallery section -->
                    <div class="gallery" class="photo-container">

                   
                    <div  class="gallery-item" tabindex="0">
                       
                            <img src=""
                                class="gallery-image" alt="">
                       


                            <div class="gallery-item-info">

                                <ul>

                                    <li class="gallery-item-likes"><span class="visually-hidden"></span><i class="far fa-heart"
                                    aria-hidden="true"></i></li>

                                    <li class="gallery-item-comments"><span class="visually-hidden"></span><i
                                    class="far fa-comment" aria-hidden="true"></i> </li>

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
    </div>
</div>
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
