<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{asset('assets/img/logo1.ico')}}"/>
        <!-- Global styles -->
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #111526;
                color: white;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 12px;
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
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center text-white">
                            <img src="{{asset('assets/img/logow2.png')}}" alt="logo" class="admire_logo"><br/>
                            <span  style="font-size: 2em;">SAFE PRACTICE</span>
                        </h3>
                    </div>
                </div>

                <div class="links">
                    <a href="#">link</a>
                    <a href="#">link</a>
                    <a href="#">link</a>
                    <a href="#">link</a>
                    <a href="#">link</a>
                </div>
            </div>
        </div>
    </body>
</html>
