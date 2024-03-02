@extends('welcomepage.layoutwelcome')

@section('title')
Welcome to Instagram
@endsection

@section('content')
<h1 class="text-center p-4 ">Welcome to Instagram</h1>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="row justify-content-center my-5 position-relative">
        <div class="col-md-6">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div  style="height: 400px;" class="carousel-inner" >
                    <div class="carousel-item active">
                        <img class="d-block w-100 rounded-lg" src="https://securityintelligence.com/wp-content/uploads/2016/08/identity-theft-and-social-media.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 rounded-lg" src="https://www.loopreturns.com/wp-content/uploads/2023/07/AdobeStock_614704568.jpeg" alt="Second slide">
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="col-md-6 align-self-center">
            <div class=" logreg p-4 border rounded text-center">
                <a href="{{ url('register') }}" class="text-decoration-none">
                    <input style="border: none;" class="w-100 rounded button bg-primary mb-3" type="submit" value="Register">
                </a>
                <a href="{{ url('login') }}" class="text-decoration-none">
                    <input style="border: none;" class="w-100 rounded button bg-primary" type="submit" value="Login">
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
