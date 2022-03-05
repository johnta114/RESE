@extends('layouts.default')

@section('pageName')
    {{$shop->shop_name}} 店舗詳細ページ
@endsection

@section('content')
<div class="w-full justify-center items-center gap-12 md:flex mb-10">
    <!-- 店舗情報 -->
    <div class="w-full mb-10">
        <h2 class="text-3xl font-bold mb-5">{{$shop->shop_name}}</h2>
        <div class="w-ful mb-5">
            <img class="w-full" src="{{$shop->image}}" alt="店舗画像">
        </div>
        <div class="flex items-center mb-5">
            <div class="pr-3 mr-2 relative z-0 after:content-[':'] after:absolute after:top-0 after:right-0">場所</div>
            <div class="text-base text-black font-normal">{{$shop->erea->erea_name}}</div>
            <span class="px-5">/</span>
            <div class="pr-3 mr-2 relative z-0 after:content-[':'] after:absolute after:top-0 after:right-0">ジャンル</div>
            <div class="text-base text-black font-normal">{{$shop->genre->genre_name}}</div>
        </div>
        <p class="text-lg">{{$shop->overview}}</p>
    </div>
    <!-- 予約情報 -->
    <div class="w-full text-center bg-white md:rounded md:shadow-md">
        <h2 class="text-3xl font-bold text-black py-5">予約</h2>
        <form action="/done" method="POST">
            <input type="hidden" name="shop_id" value="{{$shop->id}}">
            <!-- datepicker -->
            <div class="flex items-center justify-center w-full">
                <div class="mb-3 w-full md:w-3/4">
                    <input type="text" name="reservation_date" required  class="datepicker form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition  placeholder-black cursor-pointer" placeholder="来店日"/>
                    @error('reservation_date')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <!-- timepicker -->
            <div class="flex justify-center w-full">
                <div class="mb-3 w-full md:w-3/4">
                    <input type="text"  name="reservation_time" required class="timepicker form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition placeholder-black cursor-pointer" placeholder="来店時間"/>
                    @error('reservation_time')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center w-full">
                <div class="mb-5 w-full md:w-3/4">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded cursor-pointer" aria-label="Default select example" name="number_people" required>
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
                    @error('number-people')
                        <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>
            @csrf
            <button type="submit" class="w-full md:w-2/3 px-6 py-2 mb-4 bg-orange-400 text-white text-xl rounded cursor-pointer hover:opacity-80">予約する</button>
        </form>
    </div>
</div>
<!-- レビュー -->
<div class="w-full md:w-1/2">
    <h2 class="text-center md:text-left text-3xl font-bold mb-5">レビュー</h2>
    @if(!$reviewsExits)
        <div class="texy-center">
            <h3 class="text-lg text-orange-400 font-normal text-center">レビューがありません。</h3>
        </div>
    @endif
    @foreach ($reviews as $review)
    <div class="w-full p-2 border-t border-solid border-black">
        <div class="w-full mb-2">
            @if($review->star == 5)
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
            @elseif($review->star == 4)
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-gray-400"></i>
            @elseif($review->star == 3)
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
            @elseif($review->star == 2)
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
            @elseif($review->star == 1)
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
            @else
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
                <i class="fas fa-star text-gray-400"></i>
            @endif
        </div>
        <div class="w-full line-clamp-2">{{$review->comment}}</div>
    </div>
    @endforeach
</div>
<script src="{{ asset('/js/datetime.js') }}"></script>
@endsection