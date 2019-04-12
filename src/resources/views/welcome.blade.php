<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 90vh;
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
            top: 10px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
            color:rgb(213, 35, 73);
            position:relative;
            top:-20px;
        }
        .links > a {
            color:rgb(213, 35, 73);
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

    <div class="content">

        <div class="top-right links">
            <a href="{{ route('dashboard.home') }}">Let's Started</a>
        </div>

        <img src="{{ \Yasser\LaravelDashboard\Helper\Assets::loadImg('logo-256.png') }}">

        <div class="title m-b-md">
            Laravel Dashboard
        </div>

        <div class="links">
            <a href="">Docs</a>
            <a href="">Features</a>
            <a href="">Releases</a>
            <a href="">Blog</a>
            <a href="">Donate</a>
            <a href="">GitHub</a>
        </div>

    </div>

</div>
</body>
</html>
