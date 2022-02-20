<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        #loader{
            transition:all .3s ease-in-out;
            opacity:1;visibility:visible;
            position:fixed;
            height:100vh;
            width:100%;
            background:#fff;
            z-index:90000
        }
        #loader.fadeOut{
            opacity:0;
            visibility:hidden
        }
        /* .actived {
            background-color: rgb(255, 225, 230);
        } */
        .spinner{
            width:40px;
            height:40px;
            position:absolute;
            top:calc(50% - 20px);
            left:calc(50% - 20px);
            background-color:#333;
            border-radius:100%;
            -webkit-animation:sk-scaleout 1s infinite ease-in-out;
            animation:sk-scaleout 1s infinite ease-in-out
        }
        @-webkit-keyframes sk-scaleout{
            0%{
                -webkit-transform:scale(0)
            }100%{
                -webkit-transform:scale(1);
                opacity:0
            }
        }
        @keyframes sk-scaleout{
            0%{
                -webkit-transform:scale(0);
                transform:scale(0)
            }
            100%{
                -webkit-transform:scale(1);
                transform:scale(1);
                opacity:0
            }
        }
    </style>
    @yield('style')
    <script defer="defer" src="{{asset('main.js')}}"></script>
</head>
<body class="app">
    <div id="loader"><div class="spinner"></div></div>
    <script>
        window.addEventListener("load", function () {
            const t = document.getElementById("loader");
            setTimeout(function () {
                t.classList.add("fadeOut");
            }, 300);
        });
    </script>
    <div>
        @extends('layouts.anime.sidebar')
        <div class="page-container">
            @yield('content')
            @extends('layouts.anime.footer')
        </div>
    </div>
    @yield('script')
</body>
</html>
