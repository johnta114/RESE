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
                    <input class="hidden outline-none md:inline-block py-2 px-4 w-full cursor-text focus:border-b focus:border-solid focus:border-orange-400 placeholder:text-black" type="text" name="keyword" value="{{old('keyword')}}" placeholder="店名">
                </span>
                <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                    <select class="appearance-none outline-none py-2 px-4 w-full bg-white rounded-none cursor-pointer focus:border-b focus:border-solid focus:border-orange-400" name="erea">
                        <option hidden value="">場所</option>
                        <option value="">全て</option>
                        @foreach ($ereas as $erea)
                        <option value="{{$erea->id}}">{{$erea->erea_name}}</option>
                        @endforeach
                    </select>
                </span>
                <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                    <select class="appearance-none outline-none py-2 px-4 w-full bg-white rounded-none cursor-pointer focus:border-b focus:border-solid focus:border-orange-400" name="genre">
                        <option hidden value="">ジャンル</option>
                        <option value="">全て</option>
                        @foreach ($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                        @endforeach
                    </select>
                </span>
                <button class="py-2 px-6 w-full md:w-auto rounded-b md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">検索</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="w-full mx-auto flex flex-wrap justify-center items-center gap-5">
@foreach ($shops as $shop)
    <div class="w-full md:w-56 gap-1 rounded-xl bg-white shadow-lg shadow-gray">
        <div class="w-full rounded-t-xl">
            <img src="{{$shop->image}}" alt="お店の画像" class="w-full rounded-t-xl">
        </div>
        <div class="w-full h-1/2 rounded-b-xl p-3">
            <h2 class="font-bold text-xl my-1">{{$shop->shop_name}}</h2>
            <div class="flex items-center pb-2">
                <p class="text-sm mr-4">#{{$shop->erea->erea_name}}</p>
                <p class="text-sm">#{{$shop->genre->genre_name}}</p>
            </div>
            <div class="flex flex-wrap justify-between items-center">
                <div>
                    <form action="/ditail" method="GET">
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        @csrf
                        <button type="submit" class="text-sm text-white bg-blue-600 rounded-md py-1.5 px-3 cursor-pointer hover:bg-blue-800">詳しく見る</button>
                    </form>
                </div>
                <div>
                @auth
                    @if ($shop->is_favorited_by_auth_user())
                        <form action="/unlike" method="POST">
                            <input type="hidden" name="shop_id" value="{{$shop->id}}">
                            @csrf
                            <button type="submit"><i class="fas fa-heart text-2xl text-red-500 cursor-pointer"></i></button>
                        </form>
                    @else
                        <form action="/like" method="POST">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{$shop->id}}">
                            <button type="submit"><i class="fas fa-heart text-2xl text-gray-400 cursor-pointer"></i></button>
                        </form>
                    @endif
                @endauth
                </div>
            </div>
        </div>
    </div>
@endforeach
<button class="fixed right-5 bottom-5 opacity-80 w-12 h-12 rounded-full border-none cursor-pointer bg-gray-400" id="button">↑</button>
<script src="{{ asset('/js/home.js') }}"></script>
@endsection