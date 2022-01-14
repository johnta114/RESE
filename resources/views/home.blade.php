@extends('layouts.default')
@section('content')
<h1>home.blade.php</h1>

<form action="/find" method="get">
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
        <td>
            {{$shop->erea->erea_name}}
        </td>
        <td>
            {{$shop->genre->genre_name}}
        </td>
        <td>
            <a href="">詳しく見る</a>
        </td>
    </tr>
@endforeach
</table>

@endsection