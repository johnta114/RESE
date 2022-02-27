@extends('layouts.default')

@section('content')
<div class="w-full md:w-1/3 mx-auto">
    <h2 class="text-center text-2xl mb-5 font-bold">予約の変更を受け付けました</h2>
    <div class="w-2/3 mx-auto">
        <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal mb-2">
            <div class="ml-3 w-1/3">店名</div>
            <div class="w-2/3 text-left">{{$reservation->shop->shop_name}}</div>
        </div>
        <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal mb-2">
            <div class="ml-3 w-1/3">日付</div>
            <div class="w-2/3">{{$reservation->reservation_date}}</div>
        </div>
        <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal mb-2">
            <div class="ml-3 w-1/3">時間</div>
            <div class="w-2/3">{{substr($reservation->reservation_time, 0, 5)}}</div>
        </div>
        <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal mb-5">
            <div class="ml-3 w-1/3">人数</div>
            <div class="w-2/3">{{$reservation->number_people}}人</div>
        </div>
    </div>
</div>

@endsection