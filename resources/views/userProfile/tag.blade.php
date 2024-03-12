<!DOCTYPE html>
<html lang="en">

<head>
    <title>profile</title>
    <<meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <!-- Include Slick Slider CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    @extends('layouts.StyleProfile')
    <style>
        .profile-tag h2 {
            font-weight:700;
        }
        .profile-tag h3{
            color:blue;
        }

    </style>
</head>

<body>

{{--<!-- ---------------------------------------------header profile---------------------------------->--}}

<header>
    <div>

        <a href="{{route('posts.index')}}">
            <button  class="prev-arrow btn btn-primary">
                <i class="fas fa-chevron-left"></i> Home
            </button>
        </a>
    </div>
    <!-- start of profile container -->
    <div class="container">
        <!-- start of profile section -->
        <div class="profile">

            <div class="profile-tag">

                <h2>posts with tag: <h3>#{{$tag_name}}</h3></h2>


            </div>
        </div>
        <!-- End of profile section -->
    </div>
    <!-- End of profile container -->
</header>
<hr>
<!-----------------------------------------gallery------------------------------------------------->
<div class="container">
    <div class="gallery" class="photo-container">
        @foreach(json_decode($tagPosts) as $post)
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
                                                                                               aria-hidden="true"></i>{{$post->like_count}}</li>
                        <li class="gallery-item-comments"><span class="visually-hidden"></span><i
                                class="far fa-comment" aria-hidden="true"></i>{{$post->comment_count}}</li>
                        <li class="gallery-item-save"><span class="visually-hidden"></span><i
                                class="far fa-bookmark" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    <!-- End of gallery -->

</div>
<!-- End of container -->

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
