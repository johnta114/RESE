@extends('layouts.default')

@section('content')
<h2 class="text-center text-2xl mb-5 font-bold">予約の変更を受け付けました</h2>
<div class="bg-blue-600 w-96 mb-5 mx-auto p-5 rounded shadow-md shadow-gray-500">
        <div class="mb-2">
            <i class="far fa-clock text-white"></i>
        </div>
        <table class="mx-auto mb-5">
            <tr>
                <th class="font-normal text-white pr-10">店名</th>
                <td class="font-normal text-white">{{$reservation->shop->shop_name}}</td>
            </tr>
            <tr>
                <th class="font-normal text-white pr-10">日付</th>
                <td class="text-white">{{$reservation->reservation_date}}</td>
            </tr>
            <tr>
                <th class="font-normal text-white pr-10">時間</th>
                <td class="text-white">{{$reservation->reservation_time}}</td>
            </tr>
            <tr>
                <th class="font-normal text-white pr-10">人数</th>
                <td class="text-white">{{$reservation->number_people}}</td>
            </tr>
        </table>
    </div>

@endsection