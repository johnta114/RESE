<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/64fa18308f.js" crossorigin="anonymous"></script>
</head>
<body class="max-w-6xl bg-gray-200 px-5 py-14 m-auto">
<!-- header -->
<header>
    <div class="container mb-10">
        <nav id="nav" class="absolute w-full h-screen -left-full bg-gray-200 text-center duration-700">
            <ul class="mt-20">
                <li class="mb-10 text-3xl"><a class="text-blue-600" href="/">Home</a></li>
                @auth
                <form method="POST" action="/logout">
                    @csrf
                    <li class="mb-10 text-3xl">
                        <a class="text-blue-600" href="/logout" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                    </li>
                </form>
                <form method="POST" action="/mypage">
                    @csrf
                    <li class="text-3xl"><a class="text-blue-600" href="/mypage"  onclick="event.preventDefault();this.closest('form').submit();">Mypage</a></li>
                </form>
                @endauth
                @guest
                <li class="mb-10 text-3xl"><a class="text-blue-600" href="/register">Registration</a></li>
                    <li class="mb-10 text-3xl"><a class="text-blue-600" href="/login">Login</a></li>
                @endguest
                </ul>
        </nav>
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <div id="menu" class="inline-block w-14 h-14 rounded-xl shadow-md shadow-gray-500 bg-blue-600 relative cursor-pointer">
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