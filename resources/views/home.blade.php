@extends('layouts.default')
<!-- 検索 -->
@section('header')
@auth
    <form method="POST" action="/mypage">
        @csrf
        <div class="text-right my-3">
            <a class="text-xl text-black font-bold cursor-pointer hover:opacity-60" href="/mypage"  onclick="event.preventDefault();this.closest('form').submit();">
                <i class="fas fa-user pr-3"></i>{{Auth::user()->name}}  さん
            </a>
        </div>
    </form>
@endauth
<div class="md:py-7 md:px-5 bg-white rounded shadow-md shadow-gray-500 flex items-center">
    <div class="w-full md:px-4 rounded">
        <div class="hidden md:block text-center h-auto x-auto pb-4 text-base text-black font-normal">店名・場所・ジャンルから探す</div>
        <div class="black md:hidden text-center h-auto x-auto pt-1 text-base text-black font-normal">場所・ジャンルから探す</div>
        <div class="text-center">
            <form action="/search" method="GET">
                <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                    <input class="hidden outline-none md:inline-block py-2 px-4 w-full cursor-text hover:border-b hover:border-orange-400 hover:border-solid focus:border-b focus:border-solid focus:border-orange-400 placeholder:text-black" type="text" name="keyword" value="{{old('keyword')}}" placeholder="店名">
                </span>
                <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                    <select class="appearance-none outline-none py-2 px-4 w-full bg-white rounded-none cursor-pointer hover:border-b hover:border-orange-400 hover:border-solid focus:border-b focus:border-solid focus:border-orange-400" name="erea">
                        <option hidden value="">場所</option>
                        <option value="">全て</option>
                        @foreach ($ereas as $erea)
                        <option value="{{$erea->id}}">{{$erea->erea_name}}</option>
                        @endforeach
                    </select>
                </span>
                <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                    <select class="appearance-none outline-none py-2 px-4 w-full bg-white rounded-none cursor-pointer hover:border-b hover:border-orange-400 hover:border-solid focus:border-b focus:border-solid focus:border-orange-400" name="genre">
                        <option hidden value="">ジャンル</option>
                        <option value="">全て</option>
                        @foreach ($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                        @endforeach
                    </select>
                </span>
                <button class="appearance-none outline-none py-2 px-6 w-full md:w-auto rounded-b md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">検索</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('content')
@foreach ($shops as $shop)
    <div class="card w-full md:w-11/12 py-5 px-8 mx-auto border-t border-solid border-black md:flex md:justify-start md:items-center md:gap-20">
        <div class="card-img w-ful md:w-96">
            <a class="w-full" href="http://127.0.0.1:8000/ditail/{{{$shop->id}}}">
                <img class="w-full  hover:opacity-80 cursor-pointer" src="{{$shop->image}}" alt="お店の画像">
            </a>
        </div>
        <div class="card-contents w-full md:w-[calc(100% - 150rem)]">
            <div class="flex justify-between items-center mb-5">
                <h2 class="shop-name text-3xl text-blue-400 hover:text-orange-400 hover:border-b hover:border-solid hover:border-orange-400">
                    <a href="http://127.0.0.1:8000/ditail/{{{$shop->id}}}">
                        {{$shop->shop_name}}
                    </a>
                </h2>
                <div>
                    @auth
                        @if ($shop->is_favorited_by_auth_user())
                            <form action="/unlike" method="POST">
                                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                @csrf
                                <button type="submit"><i class="fas fa-heart text-xl text-red-400 cursor-pointer"></i></button>
                            </form>
                        @else
                            <form action="/like" method="POST">
                                @csrf
                                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                <button type="submit"><i class="fas fa-heart text-xl text-gray-400 cursor-pointer"></i></button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="flex items-center pb-2">
                <div class="pr-4">タグ:</div>
                <form action="/search" method="GET">
                    <input type="hidden" name="erea" value="{{$shop->erea_id}}">
                    <button class="cursor-pointer" type="submit">{{$shop->erea->erea_name}}</button>
                </form>
                <span class="px-5">/</span>
                <form action="/search" method="GET">
                    <input type="hidden" name="genre" value="{{$shop->genre_id}}">
                    <button class="cursor-pointer" type="submit">{{$shop->genre->genre_name}}</button>
                </form>
            </div>
            <div>
                <form  action="/ditail/{{{$shop->id}}}" method="GET">
                    @csrf
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button type="submit">詳しく見る</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
<button class="fixed right-5 bottom-5 opacity-80 w-12 h-12 rounded-full border-none cursor-pointer bg-gray-400" id="button">↑</button>
<script src="{{ asset('/js/home.js') }}"></script>
@endsection