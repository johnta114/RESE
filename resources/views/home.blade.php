@extends('layouts.default')
<!-- 検索 -->
@section('header')
<form class="flex" action="/search" method="GET">
    @csrf
    <input class="placeholder-black form-control flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="keyword" value="{{old('keyword')}}" placeholder="検索ワード">
    <select class="form-control flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="erea" value="{{old('erea')}}">
        <option value="">全ての地域</option>
    @foreach ($ereas as $erea)
        <option value="{{$erea->id}}">{{$erea->erea_name}}</option>
    @endforeach
    </select>
    <select class="form-control flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="genre" value="{{old('genre')}}">
        <option hidden value="">全てのジャンル</option>
    @foreach ($genres as $genre)
        <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
    @endforeach
    </select>
    <input class="btn  px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="submit" value="検索">
</form>
@endsection

@section('content')
<div class="w-full mx-auto flex flex-wrap justify-center items-center gap-5">
@foreach ($shops as $shop)
    <div class="w-56 gap-1 rounded-xl bg-white shadow-lg shadow-gray">
        <div class="w-full rounded-t-xl">
            <img src="{{$shop->image}}" alt="お店の画像" class="w-full rounded-t-xl">
        </div>
        <div class="w-full rounded-b-xl p-3">
            <h2 class="font-bold text-lg my-1">{{$shop->shop_name}}</h2>
            <div class="flex items-center pb-2">
                <p class="text-xs mr-4">#{{$shop->erea->erea_name}}</p>
                <p class="text-xs">#{{$shop->genre->genre_name}}</p>
            </div>
            <div class="flex flex-wrap justify-between items-center">
                <div>
                    <form action="/ditail" method="GET">
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        @csrf
                        <button type="submit" class="text-xs text-white bg-blue-600 rounded-md py-1.5 px-3">詳しく見る</button>
                    </form>
                </div>
                <div>
                @auth
                    @if ($shop->is_favorited_by_auth_user())
                        <form action="/unlike" method="POST">
                            <input type="hidden" name="shop_id" value="{{$shop->id}}">
                            @csrf
                            <button type="submit"><i class="fas fa-heart text-xl text-red-500"></i></button>
                        </form>
                    @else
                        <form action="/like" method="POST">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{$shop->id}}">
                            <button type="submit"><i class="fas fa-heart text-xl  text-gray-400"></i></button>
                        </form>
                    @endif
                @endauth
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection