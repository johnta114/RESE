@extends('layouts.default')
@section('pageName')
    RESE
@endsection
<!-- 検索 -->
@section('header')
<div class="mb-5 md:mb-32 bg-[url('{{asset('img/firstview.jpg')}}')] w-full h-96 bg-cover relative">
    <div class="md:py-7 md:px-5 bg-white rounded shadow-md shadow-gray-500 flex items-center absolute z-0 left-0 md:left-10 right-0 md:right-10 bottom-0 md:-bottom-20 opacity-80 md:opacity-100">
        <div class="w-full md:px-4 rounded">
            <div class="block text-center h-auto x-auto pt-3 md:pt-0 pb-4 text-base text-black font-normal">店名・場所・ジャンルから探す</div>
            <div class="text-center">
                <form action="/search" method="GET">
                    <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                        <input class="outline-none md:inline-block py-2 px-4 w-full cursor-text border-b border-solid border-transparent hover:border-b hover:border-orange-400  focus:border-b focus:border-orange-400 placeholder:text-black" type="text" name="keyword" value="{{old('keyword')}}" placeholder="店名">
                    </span>
                    <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                        <select class="appearance-none outline-none py-2 px-4 w-full bg-white rounded-none cursor-pointer border-b border-transparent hover:border-orange-400 border-solid focus:border-b focus:border-orange-400" name="erea">
                            <option hidden value="">場所</option>
                            <option value="">全て</option>
                            @foreach ($ereas as $erea)
                            <option value="{{$erea->id}}">{{$erea->erea_name}}</option>
                            @endforeach
                        </select>
                    </span>
                    <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                        <select class="appearance-none outline-none py-2 px-4 w-full bg-white rounded-none cursor-pointer border-b border-transparent hover:border-orange-400 border-solid focus:border-b focus:border-solid focus:border-orange-400" name="genre">
                            <option hidden value="">ジャンル</option>
                            <option value="">全て</option>
                            @foreach ($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                            @endforeach
                        </select>
                    </span>
                    <button class="appearance-none outline-none py-2 px-6 w-full md:w-auto rounded-b md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">検索</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="mb-2 text-black text-base font-normal">{{ $shops->firstItem() }}〜{{ $shops->lastItem() }}店舗表示（全{{$shopCount}}店舗）</div>
@foreach ($shops as $shop)
    <div class="card w-full md:w-11/12 py-5 md:px-8 mx-auto border-t border-solid border-gray-400 md:flex md:justify-start md:items-center md:gap-20 mb-5">
        <div class="card-img w-ful md:w-96">
            <a class="w-full" href="https://fierce-bayou-22150.herokuapp.com/ditail/{{{$shop->id}}}">
                <img class="w-full  hover:opacity-80 cursor-pointer" src="{{$shop->image}}" alt="お店の画像">
            </a>
        </div>
        <div class="card-contents w-full md:w-[calc(100% - 150rem)]">
            <div class="flex justify-between items-center my-5 md:mt-0">
                <h2 class="shop-name text-3xl text-blue-400 hover:text-orange-400 border-b border-solid border-transparent hover:border-orange-400">
                    <a href="http://127.0.0.1:8000/ditail/{{{$shop->id}}}">
                        {{$shop->shop_name}}
                    </a>
                </h2>
                <div>
                    @auth
                        @if ($shop->is_favorited_by_auth_user())
                            <form action="/unlike" method="POST">
                                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                @csrf
                                <button type="submit"><i class="fas fa-heart text-xl text-red-400 cursor-pointer"></i></button>
                            </form>
                        @else
                            <form action="/like" method="POST">
                                @csrf
                                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                <button type="submit"><i class="fas fa-heart text-xl text-gray-400 cursor-pointer"></i></button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="text-base text-black font-normal w-full my-5 line-clamp-2">{{$shop->overview}}</div>
            <div class="flex items-center mb-5">
                <div class="pr-3 mr-2 relative z-0 after:content-[':'] after:absolute after:top-0 after:right-0">場所</div>
                <form action="/search" method="GET">
                    <input type="hidden" name="erea" value="{{$shop->erea_id}}">
                    <button class="border border-solid border-gray-400 bg-gray-200 py-1 px-2 rounded cursor-pointer hover:opacity-80" type="submit">{{$shop->erea->erea_name}}</button>
                </form>
                <span class="px-5">/</span>
                <div class="pr-3 mr-2 relative z-0 after:content-[':'] after:absolute after:top-0 after:right-0">ジャンル</div>
                <form action="/search" method="GET">
                    <input type="hidden" name="genre" value="{{$shop->genre_id}}">
                    <button class="border border-solid border-gray-400 bg-gray-200 py-1 px-2 rounded cursor-pointer hover:opacity-80" type="submit">{{$shop->genre->genre_name}}</button>
                </form>
            </div>
            <div class="flex justify-start items-center">
                @foreach ($stars as $star)
                    @if($star->shop_id == $shop->id)
                    <div class="mr-8 text-2xl">
                        @if($star->star_avg > 4)
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                        @elseif($star->star_avg > 3)
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-gray-400"></i>
                        @elseif($star->star_avg > 2)
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-gray-400"></i>
                            <i class="fas fa-star text-gray-400"></i>
                        @elseif($star->star_avg > 1)
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-gray-400"></i>
                            <i class="fas fa-star text-gray-400"></i>
                            <i class="fas fa-star text-gray-400"></i>
                        @elseif($star->star_avg > 0)
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
                    <div>{{number_format(round($star->star_avg, 2),2)}}</div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    {{ $shops->links() }}
<button class="fixed right-5 bottom-5 opacity-80 w-12 h-12 rounded-full border-none cursor-pointer bg-gray-400" id="button">↑</button>
<script src="{{ asset('/js/home.js') }}"></script>
@endsection