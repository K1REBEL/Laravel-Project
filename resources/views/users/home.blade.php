<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />

  @extends('layouts.Stylehome')
  
  <title>Instagram</title>
</head>

<body>
  <!-- ===============start navbar========== -->

  <!-- ====================end navbar=============== -->

  <!-- ===================start posts=============== -->

  <!-- =====================post1==================== -->
  <div class="container offset-2 mt-4 middlearea">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

        <div class="card">
          <div class="card-header">
            <img src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" class="mr-2" style="width: 35px; height: 35px; border-radius: 50%" />
            <span class="postuserfont"><b>mohammed</b></span>
            <span class="float-right mt-2">
              <b><i class="fas fa-ellipsis-h"></i></b></span>
          </div>

          <img src="https://www.etondigital.com/wp-content/uploads/2019/05/laravel-blog.png" class="card-img-top" alt="..." />
          <ul class="list-group list-group-horizontal mt-1" style="list-style-type: none; border: 0">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-heart fa-lg" style="color: black; position: relative; font-size: 23px"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-comment fa-lg" style="color: black; position: relative; font-size: 23px; margin-left: -11px;"></i></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-paper-plane fa-lg" style="color: black; position: relative; font-size: 23px; margin-left: -11px;""></i></a>
            </li>
            <span class=" offset-7">
            <li class="nav-item ml-4">
              <a class="nav-link ml-2" href="#"><i class="far fa-bookmark fa-lg" style="color: black; position: relative; font-size: 23px"></i></a>
            </li>
            </span>
          </ul>

          <span>

            <div class="card-body" style="margin-top: -15px">
              <p class="card-text postuserfont">
                <b style="margin-left: -4px; margin-right: 5px">rotana
                </b> very good!

              </p>
              <a href="#" style="text-decoration: none">
                <p class="card-text postuserfont" style="
                    margin-left: -4px;
                    margin-top: -14px;
                    color: rgb(139, 133, 133);">
                  15 hours
                </p>

            </div>
            <div class="card-footer" style="
                color: rgb(139, 133, 133);
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI',
                  Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans',
                  'Helvetica Neue', sans-serif;
                font-size: 14px;">
              <input style="border:none; outline:none; margin-left: -4px " type="text" placeholder="Add Comments..." />
              <button class="float-right" style="border:none; outline:none; color: #0095f6; opacity: 50%"><strong>post</strong></button>
            </div>
        </div>

        <!-- ==================post2======================== -->

        <div class="card mt-5 mb-3">
          <div class="card-header">
            <img src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" class="mr-2" style="width: 35px; height: 35px; border-radius: 50%" />
            <span class="postuserfont"><b>mohammed</b></span>
            <span class="float-right mt-2">
              <b><i class="fas fa-ellipsis-h"></i></b></span>
          </div>

          <img src="https://www.etondigital.com/wp-content/uploads/2019/05/laravel-blog.png" class="card-img-top" alt="..." />
          <ul class="list-group list-group-horizontal mt-1" style="list-style-type: none; border: 0">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-heart fa-lg" style="color: black; position: relative; font-size: 23px"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-comment fa-lg" style="color: black; position: relative; font-size: 23px; margin-left: -11px;"></i></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-paper-plane fa-lg" style="color: black; position: relative; font-size: 23px; margin-left: -11px;""></i></a>
            </li>
            <span class=" offset-7">
            <li class="nav-item ml-4">
              <a class="nav-link ml-2" href="#"><i class="far fa-bookmark fa-lg" style="color: black; position: relative; font-size: 23px"></i></a>
            </li>
            </span>
          </ul>
          <span>

            <div class="card-body" style="margin-top: -15px">
              <p class="card-text postuserfont">
                <b style="margin-left: -4px; margin-right: 5px">rotana
                </b> very good!

              </p>
              <a href="#" style="text-decoration: none">
                <p class="card-text postuserfont" style="
                    margin-left: -4px;
                    margin-top: -14px;
                    color: rgb(139, 133, 133);
                  ">
                  15 hours
                </p>

            </div>
            <div class="card-footer" style="
                color: rgb(139, 133, 133);
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI',
                  Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans',
                  'Helvetica Neue', sans-serif;
                font-size: 14px;
              ">
              <input style="border:none; outline:none; margin-left: -4px " type="text" placeholder="Add Comments..." />
              <button class="float-right" style="border:none; outline:none; color: #0095f6; opacity: 50%"><strong>post</strong></button>
            </div>
        </div>

        <!-- ==========================post3=============== -->
        <div class="card mt-5 mb-3">
          <div class="card-header">
            <img src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" class="mr-2" style="width: 35px; height: 35px; border-radius: 50%" />
            <span class="postuserfont"><b>mohammed</b></span>
            <span class="float-right mt-2">
              <b><i class="fas fa-ellipsis-h"></i></b></span>
          </div>

          <img src="https://www.etondigital.com/wp-content/uploads/2019/05/laravel-blog.png" class="card-img-top" alt="..." />
          <ul class="list-group list-group-horizontal mt-1" style="list-style-type: none; border: 0">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-heart fa-lg" style="color: black; position: relative; font-size: 23px"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-comment fa-lg" style="color: black; position: relative; font-size: 23px; margin-left: -11px;"></i></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-paper-plane fa-lg" style="color: black; position: relative; font-size: 23px; margin-left: -11px;""></i></a>
            </li>
            <span class=" offset-7">
            <li class="nav-item ml-4">
              <a class="nav-link ml-2" href="#"><i class="far fa-bookmark fa-lg" style="color: black; position: relative; font-size: 23px"></i></a>
            </li>
            </span>
          </ul>

          <span>

            <div class="card-body" style="margin-top: -15px">
              <p class="card-text postuserfont">
                <b style="margin-left: -4px; margin-right: 5px">rotana
                </b> very good!

              </p>
              <a href="#" style="text-decoration: none">
                <p class="card-text postuserfont" style="
                    margin-left: -4px;
                    margin-top: -14px;
                    color: rgb(139, 133, 133);">
                    15 hours </p>
            </div>
            
            <!-- ===============end posts=============== -->
            <div class="card-footer">
        
              <input style="border:none; outline:none; margin-left: -4px " type="text" placeholder="Add Comments..." />
              <button class="float-right" style="border:none; outline:none; color: #0095f6; opacity: 50%"><strong>post</strong></button>
            </div>
        </div>

      </div>
      <div class="col-12 col-sm-12 col-md-6 d-sm-none d-md-block">
        <div class="card col-xs-12 rightpanel" id="sticky-sidebar" style="width: 18rem">
          <div class="card-body d-flex">
            <div>
              <a class="nav-link" href="#">
                <span>
                  <img src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" 
                   style="
                      width: 60px;
                      height: 60px;
                      border-radius: 50%;
                      border: 2px solid rgb(238, 39, 82);
                      margin-left: -15px;" />
                  <span margin-left: 20px; "><strong>cengizcmataraci</strong>
                  </span>
                </span>
              </a>



            </div>
</body>

</html>