  @extends('main.blade.php')  
  @section('title')
Welcome to Instagram
@endsection
@section('Content')

<h1 class="mx-auto my-5 text-center">Welcome to Instagram</h1>
<div class="box">

<div class=" my-5 h-100 container align-items-center  d-flex ">
    <div class="w-100 h-100 " >
        <img class="rounded  " src="https://securityintelligence.com/wp-content/uploads/2016/08/identity-theft-and-social-media.jpg" alt="">
    </div>
    <div class="" >
        <form  class=" logform  d-flex flex-column   p-4 border rounded-2   text-center   " action="">
<input class="mb-3 rounded px-2" type="text" placeholder="username,email">
<input class="mb-3 rounded px-2" type="password" placeholder="password">
<input class="rounded button bg-primary font-weight-bold " type="submit" value="login">
<p class="font-weight-bold">Did You Forget the password ? Never Mind &#128526; <br>  <a class="text-primary" href="">Click Here</a>   </p>
<p class="font-weight-bold">Don't have account ? What are you waiting for ? <br> <span><a class="text-primary" href="">have a one</a>  </span> </p>

        </form>
    </div>
</div>
</div>
@endsection
