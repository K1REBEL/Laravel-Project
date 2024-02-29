<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://www.pinclipart.com/picdir/big/119-1198369_instagram-2016-logo-svg-vector-amp-png-transparent.png" type="image/x-icon">
    <style>
        .add-new-image {
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container bootstrap snippets bootdey mx-auto">
        <h1 class="text-primary">Edit Profile</h1>
        <hr>
         <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <div class="text-center">
                    <form class="form-horizontal" role="form" action="{{route("users.update",$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="image-container">
                        @if($user->profile_photo_path==null)
                        <img src="{{$user->profile_photo_url}}" class="avatar rounded-circle img-thumbnail" alt="avatar" id="imagePreview"  style="width: 150px; height: 150px;">
                            @else
                                <img src="{{asset('storage/'.$user->profile_photo_path)}}" class="avatar rounded-circle img-thumbnail" alt="avatar" id="imagePreview" style="width: 150px; height: 150px;">
                            @endif
                            <span class="add-new-image">change profile picture...</span>
                        <label for="fileInput">
                          <i class="bi bi-plus-circle-fill" id="addImageIcon"></i>
                        </label>
                        <input type="file" class="form-control d-none" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-9 personal-info">
                <h3>Personal info</h3>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Full name" aria-label="Full name" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="tel" class="form-control" placeholder="Phone" aria-label="Phone" name="phone" value="{{$user->phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="bio" aria-label="bio" name="bio" value="{{$user->bio}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
{{--                                <label for="">Choose gender</label>--}}
                            <select class="form-select" name="gender">
                                @if($user->gender=='male')
{{--                                    <option selected>Choose gender</option>--}}
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                @elseif($user->gender=='female')
                                    <option value="male">Male</option>
                                    <option value="female" selected>Female</option>
                                @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="website" aria-label="website" name="website" value="{{$user->website}}">
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group mt-3">
                        <div class="col-lg-offset-3 col-lg-8">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script>
   // Function to open gallery when the + icon is clicked
   document.getElementById('addImageIcon').addEventListener('click', function() {
        document.getElementById('image').click();
    });

    // Function to preview the selected image
    function previewImage(event) {
        var image = document.getElementById('imagePreview');
        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>