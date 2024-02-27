@extends('layouts.main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
@section('title')
Create post
@endsection

@section('content')
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
</head>
<body>
<div class="container">
  <div class="card">
    <h2>Create Post</h2>
    <form  method="POST" enctype="multipart/form-data">
      <label for="images">Upload Images</label>
      <input type="file" id="images" name="images[]" style="display: none" multiple >
      
      <div id="imagePreviews" class="slider"></div>

      <button type="button" id="addImageButton"><i class="bi bi-images"></i> Add Image</button>

      <label for="caption">caption</label>
      <textarea id="caption" name="caption" rows="4"></textarea>

      <label for="hashtag">hashtag</label>
      <input type="text" id="hashtag" name="hashtag">

      <button type="submit">Create Post</button>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

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
@endsection