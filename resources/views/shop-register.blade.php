@extends('layouts.default')

@section('content')
<form method="POST" action="/owner/shop/store">
    <div class="mx-auto md:w-96 rounded bg-white shadow-lg shadow-gray flex justify-center items-center">
        <div class="w-10/12 mx-auto">
            <h2 class="text-lg text-center py-4">店舗作成</h2>
            <!-- 店舗名 -->
            <div class="mb-3 w-full flex justify-between items-center">
                <input class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="店舗名" type="text" name="shop_name" value="{{old('shop_name')}}" required autofocus />
            </div>
            <!-- エリア -->
            <select class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  name="erea_id">
                <option hidden value="">エリア</option>
            @foreach ($ereas as $erea)
                <option value="{{$erea->id}}">{{$erea->erea_name}}</option>
            @endforeach
            </select>
            <!-- ジャンル -->
            <select class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  name="genre_id">
                <option hidden value="">ジャンル</option>
            @foreach ($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
            @endforeach
            </select>
            <!-- 紹介文章 -->
            <textarea class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="紹介文（200文字以内）" cols="200" rows="10" name="overview"></textarea>
            <div class="text-right mb-2">
                @csrf
                <button type="submit" class="w-full md:w-auto text-base text-white bg-blue-600 hover:bg-blue-800 cursor-pointer rounded-md py-2 px-5">作成</button>
            </div>

        </div>
    </div>
</form>
@endsection