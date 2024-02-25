  @extends('welcomepage.layoutwelcome')  
  @section('title')
Welcome to Instagram
@endsection
@section('content')

<h1 class="mx-auto my-5 text-center">Welcome to Instagram</h1>
<div class="box">

<div class=" my-5 h-100 container align-items-center  d-flex ">
    <div class="w-100 h-100 " >
        <img class="rounded  " src="https://securityintelligence.com/wp-content/uploads/2016/08/identity-theft-and-social-media.jpg" alt="">
    </div>
    <div class="" >
        <form  method="POST" action="{{url('/login') }}"  class=" logform  d-flex flex-column   p-4 border rounded-2   text-center   ">
@csrf
<input name="email" class="mb-3 rounded px-2" type="text"  placeholder="username,email">
<input name="password" class="mb-3 rounded px-2" type="password" placeholder="password">
<input class="rounded button bg-primary  " type="submit" value="login">
<p class="">Did You Forget the password ? Never Mind &#128526; <br>  <a class="text-primary" href="{{url('http://127.0.0.1:8000/forgot-password')}}">Click Here</a>   </p>
<p class="">Don't have account ? What are you waiting for ? <br> <span><a class="text-primary" href="{{url('register')}}">">have a one</a>  </span> </p>

        </form>
    </div>
</div>
</div>
@endsection
