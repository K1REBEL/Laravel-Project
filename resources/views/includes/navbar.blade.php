@section('title')
Blocked
@stop

@extends('layouts.main')

    <nav class="navbar navbar-expand-sm navbar-light border fixed-top" style="background-color: #ffffff; height: 54px">
        <div class="container">
            <a class="navbar-brand ml-lg-5 mt-1 mr-5" href="#">
                <img src="https://www.instagram.com/static/images/web/mobile_nav_type_logo.png/735145cfe0a4.png" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mr-5"></span>
            </button>

            <div class="collapse navbar-collapse ml-5 d-flex justify-content-center" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0 ml-5 d-none d-sm-block">
                    <input class="form-control mr-sm-2 empty" type="search" style="font-family: Arial, FontAwesome; height: 28px; width: 216px" aria-label="Search" placeholder="search....." />
                </form>
            </div>

            <div class="collapse navbar-collapse ml-5 mt-2" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="fas fa-home fa-lg mr-2 d-none d-sm-block mt-1"></i>
                            <span class="sr-only"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="far fa-bookmark fa-lg mr-2 d-none d-sm-block mt-1" style="color: black"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-plus-square fa-lg mr-2 d-none d-sm-block mt-1" style="color: black" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
