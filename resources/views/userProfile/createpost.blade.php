<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<style>
    body {
    font-family: "Roboto", sans-serif;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #fff;
    color: #fff;
    }

    .container {
    width: 100%;
    max-width: 400px;
    }

    .card {
    background-color: #373d4b;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
    text-align: center;
    color: #61dafb;
    }

    form {
    display: flex;
    flex-direction: column;
    }

    label {
    margin-bottom: 6px;
    }


    button {
    background-color: #61dafb;
    color: #282c37;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
    margin-top:6px;
    }

    button:hover {
    background-color: #90caf9;
    }
 </style>
<body>
  <div class="container">
    <div class="card">
      <h2>Create Post</h2>
      <form  method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <label for="images">Upload Images</label>
        <input type="file" id="images" name="images[]" style="display: none" multiple >
        
        <div id="imagePreviews" class="slider"></div>

        <button type="button" id="addImageButton"><i class="fas fa-images"></i> Add Image</button>

        <label for="caption">caption</label>
        <textarea id="caption" name="caption" rows="4"></textarea>

        <label for="hashtag">hashtag</label>
        <input type="text" id="hashtag" name="hashtag">

        <button type="submit">Create Post</button>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script>
    const imagesInput = document.getElementById('images');
    const imagePreviewsContainer = document.getElementById('imagePreviews');
    const addImageButton = document.getElementById('addImageButton');

    addImageButton.addEventListener('click', function() {
        imagesInput.click(); // Click on the hidden file input
    });

    imagesInput.addEventListener('change', function() {
        const files = this.files;
        if (files) {
            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    img.style.marginTop = '10px';
                    // Append image to slider container
                    $('#imagePreviews').slick('slickAdd', img);
                }
                reader.readAsDataURL(file);
            }
        }
    });

    // Initialize Slick Carousel
    $(document).ready(function(){
      $('#imagePreviews').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: true,
        autoplay: false,
      });
    });
  </script>
</body>
</html>