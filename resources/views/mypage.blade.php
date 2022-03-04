@extends('layouts.default')

@section('pageName')
    {{Auth::user()->name}}さんのマイページ
@endsection

@section('content')
<div class="w-full mb-8 py-2 rounded">
    <ul class="flex justify-center items-center gap-10 text-base text-black font-nomal cursor-pointer">
        <li><a href="#reservation" class="border-b border-solid border-transparent hover:border-black">予約一覧</a></li>
        <li><a href="#favorite" class="border-b border-solid border-transparent hover:border-black">お気に入り一覧</a></li>
        @if($visitsExists)
        <li><a href="#visited" class="border-b border-solid border-transparent hover:border-black">来店一覧</a></li>
        @endif
    </ul>
</div>

<!-- 予約一覧 -->
<div id="reservation" class="w-full h-auto mb-8 rounded">
    <h2 class="text-2xl font-bold mb-5 text-center">予約一覧</h2>
    @if(!$reservationsExists)
    <div class="texy-center">
        <h3 class="text-lg text-orange-400 font-normal text-center">現在、予約している店舗はありません。</h3>
    </div>
    @endif
    <div class="w-full md:flex md:flex-wrap md:justify-center md:items-center gap-5">
    @foreach ($reservations as $reservation)
        <div class="w-full md:w-64 p-5 rounded shadow-md shadow-gray-500">
            <div class="w-full flex justify-between items-center mb-1">
                <i class="far fa-clock text-xl text-black"></i>
                <form action="/mypage/delete" method="POST">
                    <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                    <input type="hidden" name="created_at" value="{{$reservation->created_at}}">
                    @csrf
                    <button type="submit"><i class="far fa-times-circle text-xl text-black hover:text-orange-400 pointer"></i></button>
                </form>
            </div>
            <div class="w-full mb-2">
                <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal">
                    <div class="ml-3">店名</div>
                    <div>{{$reservation->shop->shop_name}}</div>
                </div>
                <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal">
                    <div class="ml-3">日付</div>
                    <div>{{$reservation->reservation_date}}</div>
                </div>
                <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal">
                    <div class="ml-3">時間</div>
                    <div>{{substr($reservation->reservation_time, 0, 5)}}</div>
                </div>
                <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal">
                    <div class="ml-3">人数</div>
                    <div>{{$reservation->number_people}}人</div>
                </div>
            </div>
            <div class="text-right">
                <form action="/reservation" method="POST">
                    <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                    <input type="hidden" name="created_at" value="{{$reservation->created_at}}">
                    @csrf
                    <button type="submit" class="appearance-none outline-none py-2 px-6 w-full md:w-auto rounded md:rounded bg-orange-400 text-sm text-white hover:opacity-80 cursor-pointer">予約変更</button>
                </form>
            </div>
        </div>
    @endforeach
    </div>
</div>
    <!-- お気に入り一覧 -->
    <div id="favorite" class="w-full md:w-10/12 md:mx-auto mb-8">
        <h2 class="text-2xl font-bold mb-5 text-center">お気に入り一覧</h2>
        @if(!$favoritesExists)
        <div class="texy-center">
            <h3 class="text-lg text-orange-400 font-normal text-center">現在、お気に入りしている店舗はありません。</h3>
        </div>
        @endif
        @foreach ($favorites as $favorite)
            <div class="w-full md:flex md:justify-between md:items-center md:gap-20 py-5 mx-auto border-t border-solid border-gray-400">
                <div class="card-img w-ful md:w-96">
                    <a class="w-full" href="http://127.0.0.1:8000/ditail/{{{$favorite->shop->id}}}">
                        <img class="w-full  hover:opacity-80 cursor-pointer" src="{{$favorite->shop->image}}" alt="お店の画像">
                    </a>
                </div>
                <div class="card-contents w-full md:w-[calc(100% - 150rem)]">
                    <div class="flex justify-between items-center my-5 md:mt-0">
                        <h2 class="shop-name text-2xl text-blue-400 hover:text-orange-400 border-b border-solid border-transparent hover:border-orange-400">
                            <a href="http://127.0.0.1:8000/ditail/{{{$favorite->shop->id}}}">
                                {{$favorite->shop->shop_name}}
                            </a>
                        </h2>
                        <div>
                            <form action="/mypage/unlike" method="POST">
                                <input type="hidden" name="shop_id" value="{{$favorite->shop->id}}">
                                @csrf
                                <button type="submit"><i class="fas fa-heart text-xl text-red-400 cursor-pointer"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="text-base text-black font-normal w-full my-5 line-clamp-2">{{$favorite->shop->overview}}</div>
                </div>
            </div>
            @endforeach
    </div>
    @if($visitsExists)
    <!-- 来店一覧 -->
    <div id="favorite" class="w-full md:w-10/12 md:mx-auto">
        <h2 class="text-2xl font-bold mb-5 text-center">来店一覧</h2>
        @foreach ($visits as $visit)
            <div class="w-full md:flex md:justify-between md:items-center md:gap-20 py-5 mx-auto border-t border-solid border-gray-400">
                <div class="card-img w-ful md:w-96">
                    <a class="w-full" href="http://127.0.0.1:8000/ditail/{{{$visit->shop->id}}}">
                        <img class="w-full  hover:opacity-80 cursor-pointer" src="{{$visit->shop->image}}" alt="お店の画像">
                    </a>
                </div>
                <div class="card-contents w-full md:w-[calc(100% - 150rem)]">
                    <div class="flex justify-between items-center my-5 md:mt-0">
                        <h2 class="shop-name text-2xl text-blue-400 hover:text-orange-400 border-b border-solid border-transparent hover:border-orange-400">
                            <a href="http://127.0.0.1:8000/ditail/{{{$visit->shop->id}}}">
                                {{$visit->shop->shop_name}}
                            </a>
                        </h2>
                        <div>
                        @if ($visit->shop->is_reviewed_by_auth_user())
                        レビュー済
                        @else
                            <form action="/review" method="POST">
                                <input type="hidden" name="shop_id" value="{{$visit->shop->id}}">
                                @csrf
                                <button type="submit" class="appearance-none outline-none py-2 px-6 rounded md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer">レビューを書く</button>
                            </form>
                        @endif
                        </div>
                    </div>
                    <div class="w-full mb-2">
                        <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal">
                            <div class="ml-3">来店日</div>
                            <div>{{substr($visit->visited_at, 0, 16)}}</div>
                        </div>
                        <div class="w-full flex justify-start items-center gap-10 text-base text-black font-normal">
                            <div class="ml-3">人数</div>
                            <div>{{$visit->number_people}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
<button class="md:hidden fixed right-5 bottom-5 opacity-80 w-12 h-12 rounded-full border-none cursor-pointer bg-gray-400" id="button">↑</button>
<script src="{{ asset('/js/home.js') }}"></script>
@endsection