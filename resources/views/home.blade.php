@extends('layouts.default')
<!-- 検索 -->
@section('search')
<form action="/search" method="GET">
    @csrf
    <input type="text" name="keyword" value="">
    <select name="erea">
        <option hidden></option>
    @foreach ($ereas as $erea)
        <option value="{{$erea->id}}">{{$erea->erea_name}}</option>
    @endforeach
    </select>
    <select name="genre">
        <option hidden></option>
    @foreach ($genres as $genre)
        <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
    @endforeach
    </select>
    <input class="button" type="submit" value="検索">
</form>
@endsection

@section('content')
<h1>home.blade.php</h1>
<div>{{ Auth::id() }}</div>

<div class="w-full mx-auto flex flex-wrap justify-between items-center gap-5">
@foreach ($shops as $shop)
    <div class="w-52 mx-0.5 mb-10 rounded-xl bg-white shadow-lg shadow-gray">
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