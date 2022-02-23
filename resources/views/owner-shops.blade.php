@extends('layouts.default')

@section('pageName')
    店舗一覧
@endsection

@section('content')
<div class="md:py-7 md:px-5 mb-10 bg-white rounded shadow-md shadow-gray-500 flex items-center md:left-10 right-0 md:right-10 bottom-0 md:-bottom-20">
        <div class="w-full md:px-4 rounded">
            <div class="text-center">
                <form action="/owner/shops/search" method="POST">
                    @csrf
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

<div class="w-full">
    <div class="mb-5">
        <form method="POST" action="/owner/shop/register">
            @csrf
            <button type="submit" class="text-base font-normal text-blue-400 border-b border-solid border-transparent hover:border-orange-400 hover:text-orange-400 cursor-pointer">店舗追加</button>
        </form>
    </div>
    <table class="w-full text-base text-black font-normal table-fixed">
        <tr class="w-full">
            <th class="w-1/3 md:w-1/5 pb-5">店舗名</th>
            <th class="w-1/5 hidden md:table-cell pb-5">エリア</th>
            <th class="w-1/5 hidden md:table-cell pb-5">ジャンル</th>
            <th class="w-1/3 md:w-1/5 pb-5"></th>
            <th class="w-1/3 md:w-1/5 pb-5"></th>
        </tr>
        @foreach($shops as $shop)
            <tr class="w-full">
                <td class="w-1/3 md:w-1/5 text-center pb-3">{{$shop->shop_name}}</td>
                <td class="w-1/5 text-center hidden md:table-cell pb-3">{{$shop->erea->erea_name}}</td>
                <td class="w-1/5 text-center hidden md:table-cell pb-3">{{$shop->genre->genre_name}}</td>
                <td class="w-1/3 md:w-1/5 text-center pb-3">
                    <form action="/owner/shop/reservation" method="POST">
                        @csrf
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        <button class="py-1 px-2 rounded md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">予約一覧</button>
                    </form>
                </td>
                <td class="w-1/3 md:w-1/5 text-center pb-3">
                    <form action="/owner/shop/ditail" method="POST">
                        @csrf
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        <button class="py-1 px-2 rounded md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">編集</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection