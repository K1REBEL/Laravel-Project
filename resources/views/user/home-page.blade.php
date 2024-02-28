@extends('layouts.main')

@include('includes.navbar')
@extends('layouts.Stylehome')




<!-- ===================start posts=============== -->

<!-- =====================post1==================== -->

@section('content')



    <main class="grid grid-cols-1 md:grid-cols-3 md:max-w-6xl mx-auto">

        <section class="md:col-span-2">


            <!-- ========Posts=====  -->
            @foreach(json_decode($jsonData) as $post)
            <div class="bg-white my-7 border rounded-md">
                <div class="flex items-center p-5">
                    <img class="h-12 rounded-full object-cover border p-1 mr-3"
                         src="#" />
                    <p class="font-bold flex-1">{{$post->user_handle}}

                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>



                <img className="object-cover w-full"
                     src="#" />

                <div class="flex justify-between px-4 pt-4">
                    <div class="flex space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-chat" viewBox="0 0 16 16">
                            <path
                                d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                        </svg>

                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg " width="20" height="20" class="btn fill=" none
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span flex justify-between px-4 pt-4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-bookmark" viewBox="0 0 16 16">
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                    </svg>
                </span>
                </div>




                <!-- {/* Post comments */} -->
                <p class="p-5 truncate">
                    <span class="font-bold">{{$post->like_count}} likes.. </span>
                    <br />
                    <span class="font-bold mr-2">{{$post->user_handle}}</span> {{$post->caption}}
                    
                </p>
                <div class=" hap-2">
                    <div class="hashtag-container ">
                        <span class="hashtag ">#sea</span>
                    </div>
    
                    <div class="hashtag-container">
                        <span class="hashtag">#beachlife</span>
                    </div>
                    <div class="hashtag-container">
                        <span class="hashtag">#sunset</span>
                    </div>
    
                </div>

    
                <div class="mx-10 max-h-24 overflow-y-scroll scrollbar-none">


                    <div class="flex items-center space-x-2 mb-2">
                        <img class="h-7 rounded-full object-cover"
                             src="#" alt="user-image" />
                        <p class="font-semibold">{{$post->user_handle}}</p>
                        <p class="flex-1 truncate">{{$post->latest_comment}}</p>
                        <p>2 days ago</p>
                    </div>
                    <div class="flex items-center space-x-2 mb-2">
                        <img class="h-7 rounded-full object-cover"
                             src="#" alt="user-image" />
                        <p class="font-semibold">omar</p>
                        <p class="flex-1 truncate">great!</p>
                    </div>
                    <p>{{$post->updated_at}}</p>

                </div>

                <!-- {/* Post input box */} -->
                <form class="flex items-center p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <input class="border-none flex-1 focus:ring-0" type="text" placeholder="Enter your comment..." />
                    <button class="text-blue-400 font-bold">Post</button>
                </form>
            </div>
             @endforeach
            <!-- =================post2================ -->

            <div class="bg-white my-7 border rounded-md">
                <div class="flex items-center p-5">
                    <img class="h-12 rounded-full object-cover border p-1 mr-3"
                         src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" />
                    <p class="font-bold flex-1">mona</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>

                <img className="object-cover w-full"
                     src="https://images.unsplash.com/photo-1497449493050-aad1e7cad165?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=930&q=80" />

                <div class="flex justify-between px-4 pt-4">
                    <div class="flex space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-chat" viewBox="0 0 16 16">
                            <path
                                d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                        </svg>

                    </div>
                    
                    <span flex justify-between px-4 pt-4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-bookmark" viewBox="0 0 16 16">
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                    </svg>
                </span>

                </div>

                <p class="truncate" style="text-align: left; padding-left: 25px;">
                <span class="font-bold">2 likes.. </span>
                <br />
                <span class="font-bold mr-2">omarAly</span>nice view
            </p>
            <div class=" hap-2"style="text-align: left; padding-left: 520px;">
                <div class="hashtag-container" >
                    <span class="hashtag ">#summer</span>
                </div>

                <div class="hashtag-container">
                    <span class="hashtag">#beachlife</span>
                </div>
                <div class="hashtag-container">
                    <span class="hashtag">#sunset</span>
                </div>

            </div>



            <div class="mx-10 max-h-24 overflow-y-scroll scrollbar-none">
                <div class="flex items-center space-x-2 mb-2">
                    <img class="h-7 rounded-full object-cover"
                        src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                    <p class="font-semibold">aly</p>
                    <p class="flex-1 truncate">vow!</p>
                    <p>2 days ago</p>
                </div>
                <div class="flex items-center space-x-2 mb-2">
                    <img class="h-7 rounded-full object-cover"
                        src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                    <p class="font-semibold">omar</p>
                    <p class="flex-1 truncate">great!</p>
                    <p>1 month ago</p>
                </div>
            </div>
            <form class="flex items-center p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <input class="border-none flex-1 focus:ring-0" type="text" placeholder="Enter your comment..." />
                <button class="text-blue-400 font-bold">Post</button>
            </form>
        </div>
        </div>

            <!-- {/* Post input box */} -->


        </section>

        <section class="hidden md:inline-grid md:col-span-1">
            <div class="w-[380px] fixed">
                <div class="flex items-center justify-between mt-14 ml-10">
                    <img class="h-16 rounded-full border p-[2px]"
                         src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                    <div class="flex-1 ml-4">
                        <h2 class="font-mute">ahmedMohammed</h2>
                        <h3 class="text-sm text-gray-400">Welcome to instagram</h3>
                    </div>

                </div>
    </main>

@stop