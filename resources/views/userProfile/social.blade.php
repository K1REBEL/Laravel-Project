@extends('layouts.main')

@include('includes.navbar')
@extends('layouts.Stylehome')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')

<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="followers-tab" data-toggle="tab" href="#followers" role="tab"
                aria-controls="followers" aria-selected="true">Followers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="following-tab" data-toggle="tab" href="#following" role="tab"
                aria-controls="following" aria-selected="false">Following</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="blocked-tab" data-toggle="tab" href="#blocked" role="tab" aria-controls="blocked"
                aria-selected="false">Blocked</a>
        </li>
    </ul>


    <!-- =======================start followers============= -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active" id="followers" role="tabpanel" aria-labelledby="followers-tab">
            <div class="flex items-center justify-between mt-14 ml-10">
                <img class="h-16 rounded-full border p-[2px]"
                    src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                <div class="flex-1 ml-4">
                    <h2 class="font-bold">AhmedMohammed</h2>
                </div>
                <div class="flex items-center">
                    <button type="button" class="btn btn-primary">Remove</button>
                    <button type="button" class="btn btn-danger" style="margin-left: 10px;">Blocked</button>
                </div>
            </div>

            <!-- -------------------------------------------------------------------------------- -->
            <div class="flex items-center justify-between mt-14 ml-10">
                <img class="h-16 rounded-full border p-[2px]"
                    src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                <div class="flex-1 ml-4">
                    <h2 class="font-bold">AhmedMohammed</h2>
                </div>
                <div class="flex items-center">
                    <button type="button" class="btn btn-primary">Remove</button>
                    <button type="button" class="btn btn-danger" style="margin-left: 10px;">Blocked</button>
                </div>
            </div>
        </div>

        <!-- =======================start following============= -->
        <div class="tab-pane show" id="following" role="tabpanel" aria-labelledby="following-tab">
            <div class="flex items-center justify-between mt-14 ml-10">
                <img class="h-16 rounded-full border p-[2px]"
                    src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                <div class="flex-1 ml-4">
                    <h2 class="font-bold">alaa</h2>
                </div>
                <div class="flex items-center">
                    <button type="button" class="btn btn-primary">following</button>
                    <button type="button" class="btn btn-danger" style="margin-left: 10px;">Blocked</button>
                </div>
            </div>
        </div>

        <!-- =======================start blocked============= -->
        <div class="tab-pane show" id="blocked" role="tabpanel" aria-labelledby="blocked-tab">
            <div class="flex items-center justify-between mt-14 ml-10">
                <img class="h-16 rounded-full border p-[2px]"
                    src="https://icon-library.com/images/person-icon-png/person-icon-png-13.jpg" alt="user-image" />
                <div class="flex-1 ml-4">
                    <h2 class="font-bold">hoda</h2>
                </div>
                <div class="flex items-center">
                    <button type="button" class="btn btn-primary">Unblock</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @stop