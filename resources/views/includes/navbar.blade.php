@section('title')
instagram
@stop

@extends('layouts.main')
@extends('layouts.StyleHome')

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<style>
    .btn-light.dropdown-toggle::after {
        display: none;

    }

    .btn-light.dropdown-toggle {
        background-color: transparent;
        border-color: transparent;
    }
</style>
</head>

<!-- ===================navbar================== -->
<header class="shadow-sm border-b sticky top-0 bg-white z-30">
    <div class="flex h-24 items-center justify-between xl:max-w-6xl mx-4 xl:mx-auto">

        <div class="cursor-pointer w-24 relative hidden lg:inline-grid">
            <img src="http://www.jennexplores.com/wp-content/uploads/2015/09/Instagram_logo_black.png" />
        </div>
        <div class="cursor-pointer w-10 relative lg:hidden">
            <img src="https://logos-world.net/wp-content/uploads/2020/04/Instagram-icon-Logo-2016-present.png" />
        </div>


        <!-- ============================icons========================= -->

        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-3">
{{--                    <h3 class="text-center">Laravel Autocomplete Search Box</h3><hr>--}}
                    <div class="form-group">
{{--                        <h4>Type by id, name and email!</h4>--}}
                        <input type="text" name="search" id="search" placeholder="Enter search name" class="form-control" onfocus="this.value=''">
                    </div>
                    <div id="search_list"></div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>



        <div class="flex space-x-4 items-center">
            <a href="{{route('posts.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="hidden md:inline-flex h-6 cursor-pointer hover:scale-125 transition-transform duration-200 ease-out"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>
            <a href="{{route('posts.create')}}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 cursor-pointer hover:scale-125 transition-transform duration-200 ease-out" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>


            <a href="{{route('users.show',auth()->id())}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
           <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
         <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
         </svg>
            </a>

        </div>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            var query= $(this).val();
            $.ajax({
                url:"search",
                type:"GET",
                data:{'search':query},
                success:function(data){
                    $('#search_list').html(data);
                }
            });
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



