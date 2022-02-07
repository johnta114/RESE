@extends('layouts.default')
<!-- 検索 -->
@section('header')
<form class="md:flex md:text-right gap-2 items-center mt-3" action="/search" method="GET">
    @csrf
    <input class="placeholder-black block w-full px-3 py-2 mb-3 md:mb-0 text-base text-black bg-white border border-solid border-gray-300 rounded " type="text" name="keyword" value="{{old('keyword')}}" placeholder="検索ワード">
    <select class="block w-full px-3 py-2.5 mb-3 md:mb-0 text-base text-black bg-white border border-solid border-gray-300 rounded cursor-pointer" name="erea">
        <option value="">全ての地域</option>
    @foreach ($ereas as $erea)
        <option value="{{$erea->id}}">{{$erea->erea_name}}</option>
    @endforeach
    </select>
    <select class="block w-full px-3 py-2.5 mb-3 md:mb-0 text-base text-black bg-white border border-solid border-gray-300 rounded cursor-pointer" name="genre">
        <option value="">全てのジャンル</option>
    @foreach ($genres as $genre)
        <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
    @endforeach
    </select>
    <div class="text-right w-full md:w-auto">
        <input class="blok w-full md:w-auto px-6 py-2.5 bg-blue-600 text-white text-sm rounded shadow-md hover:bg-blue-800 cursor-pointer" type="submit" value="検索">
    </div>
</form>
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