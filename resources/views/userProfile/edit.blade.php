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
                    
                    <div class="image-container">
                        <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" class="avatar rounded-circle img-thumbnail" alt="avatar">
                        <span class="add-new-image">change profile picture...</span> 
                        <label for="fileInput">
                          <i class="bi bi-plus-circle-fill"></i>
                        </label>
                        <input type="file" class="form-control d-none" id="fileInput">
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center"> 
            
            <div class="col-md-9 personal-info">
                <h3>Personal info</h3>
                <form class="form-horizontal" role="form">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Full name" aria-label="Full name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" aria-label="Email">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="tel" class="form-control" placeholder="Phone" aria-label="Phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="bio" aria-label="bio">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <select class="form-select">
                                    <option selected>Choose gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="website" aria-label="website">
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group mt-3">
                        <div class="col-lg-offset-3 col-lg-8">
                            <button type="button" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

