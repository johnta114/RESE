<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300">
<!-- header -->
<header>
    <div class="container">
        <nav id="nav" class="absolute w-full h-screen -left-full bg-gray-300 text-center duration-700">
            <ul class="mt-20">
                <li class="mb-10 text-3xl"><a class="text-blue-600" href="/">Home</a></li>
                @auth
                    <li class="mb-10 text-3xl"><a class="text-blue-600" href="#">Logout</a></li>
                    <li class="text-3xl"><a class="text-blue-600" href="#">Mypage</a></li>
                @endauth
                @guest
                    <li class="mb-10 text-3xl"><a class="text-blue-600" href="#">Registration</a></li>
                    <li class="mb-10 text-3xl"><a class="text-blue-600" href="#">Login</a></li>
                @endguest
                </ul>

        </nav>
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <div id="menu" class="inline-block w-14 h-14 rounded-xl shadow shadow-gray-500 bg-blue-600 relative cursor-pointer">
                    <span id="top" class="inline-block w-1/3 h-px bg-white absolute top-4 left-2 duration-500"></span>
                    <span id="middle" class="inline-block w-2/3 h-px bg-white absolute top-1/2 left-2 duration-500"></span>
                    <span id="bottom" class="inline-block w-1/6 h-px bg-white absolute bottom-4 left-2 duration-500"></span>
                </div>
                <h1 class="text-5xl font-bold ml-4 text-blue-600 cursor-pointer"><a href="/">Rese</a></h1>
            </div>
            <div>
                @yield('search')
            </div>
        </div>
    </div>
</header>
    <div>
        @yield('content')
    </div>
<script src="{{ asset('/js/common.js') }}"></script>
</body>
</html>