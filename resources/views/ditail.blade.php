@extends('layouts.default')

@section('content')
<h1>ditail.blade.php</h1>
<div>{{ Auth::id() }}</div>

<table>
    <tr>
        <td>{{$shop->shop_name}}</td>
        <td><img src="{{$shop->image}}" alt="" class="w-8 h-4"></td>
        <td>{{$shop->erea->erea_name}}</td>
        <td>{{$shop->genre->genre_name}}</td>
        <td>{{$shop->overview}}</td>
    </tr>
    <div>予約</div>
    <form action="/done" merhod="GET">
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <input type="date" name="reservation_date" required>
        <input type="time" name="reservation_time"  min="11:00" max="21:00" required>
        <input type="number" name="number_people" min="1" max="8" required>
        @csrf
        <button type="submit">予約する</button>
    </form>
    @auth
    <div>予約一覧</div>
    <table>
        @foreach ($reservations as $reservation)
        <tr>
            <td>{{$reservation->shop->shop_name}}</td>
            <td>{{$reservation->reservation_date}}</td>
            <td>{{$reservation->reservation_time}}</td>
            <td>{{$reservation->number_people}}</td>
        </tr>
        @endforeach
    </table>
    @endauth
@endsection