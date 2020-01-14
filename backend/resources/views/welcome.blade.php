<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <title>Food factory CRM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
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

            .links > a {
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

             .myButton {
                 background-color:#44c767;
                 border-radius:28px;
                 border:1px solid #18ab29;
                 display:inline-block;
                 cursor:pointer;
                 color:#ffffff;
                 font-family:Arial;
                 font-size:28px;
                 font-weight:bold;
                 padding:24px 76px;
                 text-decoration:none;
                 text-shadow:0px 1px 0px #2f6627;
             }

            .form-control {
                width:200%;
            }
            .myButton:hover {
                background-color:#5cbf2a;
            }
            .myButton:active {
                position:relative;
                top:1px;
            }
            .offset-md-4 {
                margin-left:20%;
            }
            .list-group {
                list-style:none;
            }
        </style>
    </head>

    <body>
        <div class="flex-center position-ref">
            <div class="content">
                <div class="title m-b-md">

                <div style="margin-top:5%;">
                    <img style="width:50%; height:80%;" src="files/evos_mini.jpeg">
                </div>
                    <div>
                    Food Factory Crm
                    </div>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">

                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-8" style="margin-bottom:15%;">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Логин') }}</label>
                        <div class="col-md-6">
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="current-password" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="myButton">
                            {{ __('Войти') }}
                        </button>
                    </div>
                </div>
                </form>

                    </div>
            </div>
        </div>
    </body>
</html>
