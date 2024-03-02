  @extends('welcomepage.layoutwelcome')  
  @section('title')
Welcome to Instagram
@endsection
@section('content')







<h1 class="mx-auto my-5 text-center">Welcome to Instagram</h1>


<div class="box ">

<div class=" my-5  container align-items-center  d-flex ">

    <div id="carouselExampleSlidesOnly" class="  slideshow carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 rounded " src="https://securityintelligence.com/wp-content/uploads/2016/08/identity-theft-and-social-media.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 rounded" src="https://www.loopreturns.com/wp-content/uploads/2023/07/AdobeStock_614704568.jpeg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 rounded" src="https://img.freepik.com/premium-photo/friends-with-phone-funny-meme-social-media-relax-outdoor-during-coffee-break-communication-technology-women-together-city-comedy-with-5g-network-laughing-content-online_590464-156521.jpg" alt="Third slide">
          </div>
        </div>
      </div>


    <div class="logreg  d-flex  flex-column   p-4 border rounded-2   text-center ">
<a class=" " href="{{url('register')}}"><input class="  w-100 rounded button bg-primary  "  type="submit" value="register"></a>
<a class=" " href="{{url('login')}}"><input class="rounded w-100 button bg-primary  " type="submit" value="login"></a>


    </div>


</div>

</div>



<footer class=" w-100 text-center text-lg-start bg-body-tertiary text-muted">
    <section class="d-flex justify-content-center   p-4 border-bottom">
     
  
       
        <a href="" class="me-4 text-reset">
About
        </a>
        <a href="" class="me-4 text-reset">
Privacy
        </a>
        <a href="" class="me-4 text-reset">
 Terms
        </a>
       
    </section>
</footer>





@endsection
