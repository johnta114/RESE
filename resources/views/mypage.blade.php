@extends('layouts.default')

@section('content')
<h1>mypage.blade.php</h1>
<div>{{ Auth::id() }}</div>
<table>
    @foreach ($favorites as $favorite)
    <tr>
        <td>
            {{$favorite->shop->shop_name}}
        </td>
        <td>
            <img src="{{$favorite->shop->image}}" alt="" class="w-8 h-4">
        </td>
        <td>
                {{$favorite->shop->erea->erea_name}}
            </td>
            <td>
                {{$favorite->shop->genre->genre_name}}
            </td>
            <td>
                <form action="/ditail" method="GET">
                    <input type="hidden" name="shop_id" value="{{$favorite->shop_id}}">
                    @csrf
                    <button type="submit">詳しく見る</button>
                </form>
            </td>
            <td>
                @auth
                <form action="/mypage/unlike" method="POST">
                    <input type="hidden" name="shop_id" value="{{$favorite->shop_id}}">
                    @csrf
                    <button type="submit">お気に入り解除</button>
                </form>
                @endauth
            </td>
        </tr>
        @endforeach
        @foreach ($reservations as $reservation)
        <tr>
            <td>{{$reservation->shop->shop_name}}</td>
            <td>{{$reservation->reservation_date}}</td>
            <td>{{$reservation->reservation_time}}</td>
            <td>{{$reservation->people_number}}</td>
            <td>
                <form action="delete" method="POST">
                    <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                    <input type="hidden" name="created_at" value="{{$reservation->created_at}}">
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
        @endsection