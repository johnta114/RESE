@extends('layouts.default')

@section('content')
<div class="flex justify-center gap-8">
    <!-- 予約一覧 -->
    <div class="container w-96">
        <h2 class="text-2xl font-bold mb-5 text-center">予約状況</h2>
        @foreach ($reservations as $reservation)
        <div class="bg-blue-600 mb-5 px-5 py-3 rounded shadow-lg shadow-gray">
            <div class="flex justify-between items-center">
                <i class="far fa-clock text-white"></i>
                <form action="delete" method="POST">
                    <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                    <input type="hidden" name="created_at" value="{{$reservation->created_at}}">
                    @csrf
                    <button type="submit"><i class="far fa-times-circle text-white"></i></button>
                </form>
            </div>
            <form action="update" method="POST">
            <table>
                <tr>
                    <th class="font-normal text-white pr-10">店名</th>
                    <td class="font-normal text-white">{{$reservation->shop->shop_name}}</td>
                </tr>
                <tr>
                    <th class="font-normal text-white pr-10">日付</th>
                    <td>
                        <input type="text" name="reservation_date" required class="text-white placeholder-white rounded bg-blue-500 datepicker"  value="{{$reservation->reservation_date}}"/>
                    </td>
                </tr>
                <tr>
                    <th class="font-normal text-white pr-10">時間</th>
                    <td>
                        <input type="text"  name="reservation_time" required class="text-white placeholder-white rounded bg-blue-500 timepicker" value="{{$reservation->reservation_time}}"/>
                    </td>
                </tr>
                <tr>
                    <th class="font-normal text-white pr-10">人数</th>
                    <td>
                    <select name="number_people" class="text-white rounded bg-blue-500" required>
                        <option hidden selected >{{$reservation->number_people}}</option>
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                        <option value="4">4人</option>
                        <option value="5">5人</option>
                        <option value="6">6人</option>
                        <option value="7">7人</option>
                        <option value="8">8人</option>
                    </select>
                    </td>
                </tr>
            </table>
            @csrf
            <div class="text-right">
                <input type="hidden" name="id" value="{{$reservation->id}}">
                <button type="submit" class="text-xs tect-white bg-blue-500 text-white py-1.5 px-3 rounded">予約変更</button>
            </div>
            </form>
        </div>
        @endforeach
    </div>
        <!-- お気に入り一覧 -->
    <div class="container w-1/2">
        <h2 class="text-2xl font-bold mb-5 text-center">お気に入り一覧</h2>
        <div class="flex flex-wrap justify-center items-center gap-5">
            @foreach ($favorites as $favorite)
            <div class="w-56 gap-1 rounded-xl bg-white shadow-lg shadow-gray">
                <div class="w-full rounded-t-xl">
                    <img src="{{$favorite->shop->image}}" alt="お店の画像" class="w-full rounded-t-xl">
                </div>
                <div class="w-full rounded-b-xl p-3">
                    <h2 class="font-bold text-lg my-1">{{$favorite->shop->shop_name}}</h2>
                    <div class="flex items-center pb-2">
                        <p class="text-xs mr-4">#{{$favorite->shop->erea->erea_name}}</p>
                        <p class="text-xs">#{{$favorite->shop->genre->genre_name}}</p>
                    </div>
                    <div class="flex flex-wrap justify-between items-center">
                        <div>
                            <form action="/ditail" method="GET">
                                <input type="hidden" name="shop_id" value="{{$favorite->shop_id}}">
                                @csrf
                                <button type="submit" class="text-xs text-white bg-blue-600 rounded-md py-1.5 px-3">詳しく見る</button>
                            </form>
                        </div>
                        <div>
                            <form action="/mypage/unlike" method="POST">
                                <input type="hidden" name="shop_id" value="{{$favorite->shop_id}}">
                                @csrf
                                <button type="submit"><i class="fas fa-heart text-xl text-red-500"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection