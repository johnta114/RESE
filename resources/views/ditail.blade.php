@extends('layouts.default')

@section('content')
<div class="flex justify-center items-center gap-10">
    <!-- 店舗情報 -->
    <div class="container w-5/12">
        <h2 class="text-3xl font-bold mb-5">{{$shop->shop_name}}</h2>
        <div class="w-ful mb-5">
            <img class="w-full" src="{{$shop->image}}" alt="店舗画像">
        </div>
        <div class="flex items-center mb-5">
            <p class="text-base mr-5">#{{$shop->erea->erea_name}}</p>
            <p class="text-base">#{{$shop->genre->genre_name}}</p>
        </div>
        <p class="text-lg">{{$shop->overview}}</p>
    </div>
    <!-- 予約情報 -->
    <div class="w-5/12 text-center bg-blue-600 rounded">
        <h2 class="text-3xl font-bold text-white my-5">予約</h2>
        <form action="/done" method="POST">
            <input type="hidden" name="shop_id" value="{{$shop->id}}">
            <!-- datepicker -->
            <div class="flex items-center justify-center w-full">
                <div class="mb-3 w-3/4">
                    <input id="datepicker" type="text" name="reservation_date" required  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="来店日"/>
                    @error('reservation_date')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <!-- timepicker -->
            <div class="flex justify-center w-full">
                <div class="mb-3 w-3/4">
                    <input id="timepicker" type="text"  name="reservation_time" required class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="来店時間"/>
                    @error('reservation_time')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center w-full">
                <div class="mb-5 w-3/4">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="number_people" required>
                        <option hidden selected >来店人数</option>
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
            @csrf
            <button type="submit" class="w-full h-9 px-6 py-2.5 bg-blue-900 text-white font-medium text-xs leading-tight uppercase rounded-b shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">予約する</button>
        </form>
    </div>
</div>
@endsection