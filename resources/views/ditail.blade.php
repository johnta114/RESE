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
    <form action="/done" merhod="POST">
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <input type="date" name="reservation_date" required>
        <input type="time" name="reservation_time"  min="11:00" max="21:00" required>
        <input type="number" name="number_people" min="1" max="8" required>
        @csrf
        <button type="submit">予約する</button>
    </form>
@endsection