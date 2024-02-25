<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="https://www.pinclipart.com/picdir/big/119-1198369_instagram-2016-logo-svg-vector-amp-png-transparent.png" type="image/x-icon">
</head>
<body>
    <div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Edit Profile</h1>
          <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
          <div class="text-center">
    <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" class="avatar rounded-circle img-thumbnail" alt="avatar">
    <h6>Upload a different photo...</h6>
</div>

              <input type="file" class="form-control">
            </div>
          </div>

          <!-- edit form column -->
          <div class="col-md-9 personal-info">
            <h3>Personal info</h3>

            <form class="form-horizontal" role="form">

            <div class="form-group">
                    <label class="col-lg-3 control-label">phone</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="tel" >
                    </div>
              </div>

              <div class="form-group">
                    <label class="col-lg-3 control-label">email</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="email" >
                    </div>
              </div>

              <div class="form-group">
                    <label class="col-lg-3 control-label">full name</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="name" >
                    </div>
              </div>

              <div class="form-group">
                    <label class="col-lg-3 control-label">Website</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="">
                    </div>
              </div>

              <div class="form-group">
                    <label class="col-lg-3 control-label">Bio</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="">
                    </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">gender</label>
                <div class="col-lg-8">
                  <div class="ui-select">
                    <select id="gender" class="form-control">
                      <option value="male">male</option>
                      <option value="female">female</option>
                    </select>
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
