<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RESE</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/64fa18308f.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- jQuery-datetimepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" />
</head>
<body class="bg-gray-200 p-5 md:px-10 md:py-14 m-auto max-w-7xl">
<!-- header -->
<header>
<div class="flex justify-between items-center">
    <div class="">
        <h1 class="tittle text-4xl text-white font-bold"><a href="/">RESE</a></h1>
    </div>
    <div class="flex justify-between items-center">
        <nav id="nav" class="absolute md:static pt-16 md:pt-0 w-full md:w-auto h-screen md:h-auto top-0 -right-full md:right-0 bg-gray-200 text-center md:text-left duration-700">
            <ul class="md:flex md:justify-between md:items-center">
                <li class="nav-item pb-5 md:pb-0 px-0 md:px-4">
                    <a class="text-2xl md:text-base text-white font-normal hover:border-b hover:border-solid hover:border-white" href="/"><i class="fas fa-home pr-2 hidden md:inline-block"></i>ホーム</a>
                </li>
                @guest
                    <li class="nav-item pb-5 md:pb-0 px-0 md:px-4 md:border-l md:border-solid md:border-white">
                        <a class="text-2xl md:text-base text-white font-normal hover:border-b hover:border-solid hover:border-white" href="/register"><i class="fas fa-user-plus pr-2 hidden md:inline-block"></i>会員登録</a>
                    </li>
                    <li class="nav-item pb-5 md:pb-0 px-0 md:px-4 md:border-l md:border-solid md:border-white">
                        <a class="text-2xl md:text-base text-white font-normal hover:border-b hover:border-solid hover:border-white" href="/login"><i class="fas fa-sign-in-alt pr-2 hidden md:inline-block"></i>ログイン</a>
                    </li>
                @endguest
                @auth
                    <form method="POST" action="/mypage">
                        @csrf
                        <li class="nav-item pb-5 md:pb-0 px-0 md:px-4 md:border-l md:border-solid md:border-white">
                            <a class="text-2xl md:text-base text-white font-normal hover:border-b hover:border-solid hover:border-white" href="/mypage"  onclick="event.preventDefault();this.closest('form').submit();"><i class="fas fa-user pr-2 hidden md:inline-block"></i>マイページ</a>
                        </li>
                    </form>
                        @if(Auth::user()->role == 1)
                            <form method="POST" action="/admin">
                                @csrf
                                <li class="nav-item pb-5 md:pb-0 px-0 md:px-4 md:border-l md:border-solid md:border-white">
                                    <a class="text-2xl md:text-base text-white font-normal hover:border-b hover:border-solid hover:border-white" href="/mypage"  onclick="event.preventDefault();this.closest('form').submit();"><i class="fas fa-user-cog pr-2 hidden md:inline-block"></i>システム管理</a>
                                </li>
                            </form>
                        @elseif(Auth::user()->role == 2)
                            <form method="POST" action="/owner">
                                @csrf
                                <li class="nav-item pb-5 md:pb-0 px-0 md:px-4 md:border-l md:border-solid md:border-white">
                                    <a class="text-2xl md:text-base text-white font-normal hover:border-b hover:border-solid hover:border-white" href="/mypage"  onclick="event.preventDefault();this.closest('form').submit();">店舗管理</a>
                                </li>
                            </form>
                        @endif
                    </form>
                    <form method="POST" action="/logout">
                        @csrf
                    <li class="nav-item pb-5 md:pb-0 px-0 md:px-4 md:border-l md:border-solid md:border-white">
                        <a class="text-2xl md:text-base text-white font-normal hover:border-b hover:border-solid hover:border-white" href="/logout" onclick="event.preventDefault();this.closest('form').submit();"><i class="fas fa-sign-out-alt pr-2 hidden md:inline-block"></i>ログアウト</a>
                    </li>
                @endauth
            </ul>
        </nav>
        <div id="menu" class="inline-block w-12 h-12 bg-orange-400 rounded-xl shadow-md shadow-gray-500 cursor-pointer relative md:hidden">
            <span id="top" class="inline-block w-2/3 h-px bg-white duration-500 absolute top-4 left-2"></span>
            <span id="middle" class="inline-block w-2/3 h-px bg-white duration-500 absolute top-1/2 left-2"></span>
            <span id="bottom" class="inline-block w-2/3 h-px bg-white duration-500 absolute bottom-4 left-2"></span>
        </div>
    </div>
</div>
    <div class="my-3">
            <div>
                @yield('header')
            </div>
        </div>
    </div>
</header>
    <div class="w-full my-10">
        @yield('content')
    </div>
<script src="{{ asset('/js/common.js') }}"></script>
</body>
</html>