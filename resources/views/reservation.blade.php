@extends('layouts.default')

@section('content')
<div class="w-full md:w-1/3 mx-auto">
    <h2 class="text-center text-2xl mb-5 font-bold">予約変更</h2>
    <div class="text-center">
        <form action="/reservation/update" method="POST">
            <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
            @csrf
            <div class="w-full">
                <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal mb-2">
                    <div class="ml-3 w-1/3">店名</div>
                    <div class="w-2/3 text-left">{{$reservation->shop->shop_name}}</div>
                </div>
                <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal mb-2">
                    <div class="ml-3 w-1/3">日付</div>
                    <div class="w-2/3">
                        <input type="text" class="datepicker form-control block w-full px-3 py-1 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none " value="{{$reservation->reservation_date}}">
                    </div>
                </div>
                <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal mb-2">
                    <div class="ml-3 w-1/3">時間</div>
                    <div class="w-2/3">
                        <input type="text" class="datepicker form-control block w-full px-3 py-1 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none " value="{{substr($reservation->reservation_time, 0, 5)}}">
                    </div>
                </div>
                <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal mb-5">
                    <div class="ml-3 w-1/3">人数</div>
                    <div class="w-2/3">
                        <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="number_people" required>
                            <option hidden value="{{$reservation->number_people}}" selected >{{$reservation->number_people}}人</option>
                            <option value="1">1人</option>
                            <option value="2">2人</option>
                            <option value="3">3人</option>
                            <option value="4">4人</option>
                            <option value="5">5人</option>
                            <option value="6">6人</option>
                            <option value="7">7人</option>
                            <option value="8">8人</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="appearance-none outline-none py-2 px-6 w-full md:w-auto rounded md:rounded bg-orange-400 text-sm text-white hover:opacity-80 cursor-pointer">予約する</button>
        </form>
    </div>
</div>
<script src="{{ asset('/js/datetime.js') }}"></script>
@endsection