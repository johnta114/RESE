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
<table>
    <tr>
        <th>Data</th>
    </tr>
    @foreach ($shops as $shop)
    <tr>
        <td>
            {{$shop->shop_name}}
        </td>
        <td>
            <img src="{{$shop->image}}" alt="" class="w-8 h-4">
        </td>
        <td>
            {{$shop->erea->erea_name}}
        </td>
        <td>
            {{$shop->genre->genre_name}}
        </td>
        <td>
            <form action="/ditail" method="GET">
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                @csrf
                <button type="submit">詳しく見る</button>
            </form>
        </td>
        <td>
        @auth
            @if ($shop->is_favorited_by_auth_user())
            <form action="/unlike" method="POST">
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                @csrf
                <button type="submit">お気に入り解除</button>
            </form>
            @else
            <form action="/like" method="POST">
                @csrf
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                <button type="submit">お気に入り登録</button>
            </form>
            @endif
        @endauth
        </td>
    </tr>

@endforeach
</table>

@endsection