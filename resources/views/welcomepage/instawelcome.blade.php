
@extends('welcomepage.layoutwelcome')

@section('title')
Welcome to Instagram
@endsection

@section('content')
<style>
  body{  background: rgb(240, 238, 238);}
  
    .vertical {
      border-left: 2px solid rgb(240, 238, 238);
      height: 98%;
      position: absolute;;
      margin: 2% 0%;
      align-self: flex-end;
      left: 80%
    }
    .maintitle{      
      margin-top: 2%; 
      font-family: "Billabong W00 Regular";      
              }
  
          .container{
            margin-top: 1%;
    border-radius: 15px;
    height: 525px;
}
          
          .login{
            border-radius: 1.4rem !important;
          }
          .register{
            border-radius: 1.4rem !important;
                      }
</style>
<h1  class=" maintitle text-center p-3  ">Welcome to Instagram</h1>

<div style="background-color: white;" class="container  d-flex justify-content-center align-items-center " style="height: 100vh;">

    <div class="row justify-content-center my-0 position-relative p-1 border-2">
        <div class="col-md-8 ">
          <div style="background-color: white; "  class="p-1 rounded-3 border-2">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div  class="carousel-inner" >
                    <div class="carousel-item active">
                        <img class="d-block rounded-3 w-100 rounded-3  rounded-lg" src="https://securityintelligence.com/wp-content/uploads/2016/08/identity-theft-and-social-media.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 rounded-3 rounded-lg" src="https://img.buzzfeed.com/buzzfeed-static/static/2018-11/28/13/campaign_images/buzzfeed-prod-web-03/teens-say-social-media-isnt-as-bad-for-them-as-yo-2-7828-1543428790-3_dblbig.jpg?resize=1200:*" alt="Second slide">
                    </div>
                   
                </div>
            </div>
            
          </div>
        </div>
<div class="position-relative d-flex col-md-1" >
  <h1 class="  vertical"></h1>
</div>
        
   

        <div class="col-md-3 align-self-center ">
            <div class="  p-4  rounded text-center">
                <a href="{{ url('register') }}" class="text-decoration-none">
                    <input style="border: none;" class="w-100 register rounded-3 button bg-primary mb-3" type="submit" value="Register">
                </a>
                <a href="{{ url('login') }}" class="text-decoration-none">
                    <input style="border: none;" class="w-100 login rounded-3 button bg-primary" type="submit" value="Login">
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
