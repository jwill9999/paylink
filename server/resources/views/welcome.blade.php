<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600"
            rel="stylesheet">


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links>a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">

                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif
            <div class="container-fluid">
                <div class="content">

                    <div class="jumbotron">
                        <h1 class="display-4">Blog Posts</h1>

                        <hr class="my-4">
                        <h6 class="m-5">To view edit and delete your own posts
                            please login
                            alternatively
                            you can click on all posts to view only.</h6>
                        @if (Route::has('login'))
                        <div>
                            <a class="btn btn-outline-primary btn-lg mr-5 "
                                href="/home" role="button">View all posts</a>
                            @auth
                            <a class="btn btn-primary btn-lg "
                                href="{{ url('/home') }}">Home</a>
                            @else
                            <a class="btn btn-outline-success btn-lg mr-5"
                                href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                            <a class="btn btn-outline-info btn-lg"
                                href="{{ route('register') }}">Register</a>
                            @endif
                            @endauth
                        </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </body>

</html>
