@section('title')
instagram
@stop

@extends('layouts.main')
@extends('layouts.StyleHome')

<!-- ===================navbar================== -->
<header class="shadow-sm border-b sticky top-0 bg-white z-30">
    <div class="flex h-24 items-center justify-between xl:max-w-6xl mx-4 xl:mx-auto">

        <div class="cursor-pointer w-24 relative hidden lg:inline-grid">
            <img src="http://www.jennexplores.com/wp-content/uploads/2015/09/Instagram_logo_black.png" />
        </div>
        <div class="cursor-pointer w-10 relative lg:hidden">
            <img src="https://logos-world.net/wp-content/uploads/2020/04/Instagram-icon-Logo-2016-present.png" />
        </div>

        <!-- =================search=================== -->

        <div class="relative mt-1">
            <div class="absolute top-2 left-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" placeholder="Search"
                class="bg-gray-50 pl-10 border-gray-500 text-sm focus:ring-black focus:border-black rounded-md" id="search" name="search"/>
        </div>
        <div id="search_list"></div>

        <!-- ============================icons========================= -->
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

            <a href="#">
                <svg class="h-6 cursor-pointer hover:scale-125 transition-transform duration-200 ease-out"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark"
                    viewBox="0 0 16 16">
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                </svg>
            </a>

            <!-- =====================style drop down===============--- -->

            <head>
                <style>
                .dropdown {
                    position: relative;
                    display: inline-block;
                }

                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    z-index: 1;
                }

                .dropdown:hover .dropdown-content {
                    display: block;
                }

                .desc {
                    padding: 15px;
                    text-align: center;
                }

                @media screen and (max-width: 768px) {
                    .dropdown {
                        display: block;
                    }

                    .dropdown-content {
                        position: absolute;
                        left: -140px;
                        top: 40px;
                        display: none;
                        background-color: #f9f9f9;
                        box-shadow: none;
                    }

                    .dropdown:hover .dropdown-content {
                        display: block;
                    }
                }
                </style>
            </head>

            <!-- ========================dropdown================= -->
            <div class="dropdown">
                <img src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="Cinque Terre"
                    width="25" height="25">
                <div class="dropdown-content">
                    <a href="{{route('users.show',auth()->id())}}">
                        <div class="desc">View Profile</div>
                    </a>
                    <hr>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="desc">Log Out</div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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
            //end of ajax call
        });
        });
</script>
