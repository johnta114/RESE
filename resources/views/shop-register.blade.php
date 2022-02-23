@extends('layouts.default')

@section('pageName')
    店舗追加
@endsection

@section('content')
<form method="POST" action="/owner/shop/store" enctype="multipart/form-data">
    <div class="mx-auto w-full md:w-2/3 rounded shadow-lg shadow-gray flex justify-center items-center">
        <div class="w-10/12 mx-auto">
            <h2 class="text-lg text-center py-4">店舗作成</h2>
            <!-- 店舗名 -->
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="shop_name" value="{{old('shop_name')}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="fas fa-store-alt pr-2"></i>店舗名</label>
            </div>
            <!-- エリア -->
            <select class="form-control block w-full px-3 py-1.5 mb-6 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b-2 border-solid border-black transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  name="erea_id">
                <option hidden value="">エリア</option>
            @foreach ($ereas as $erea)
                <option value="{{$erea->id}}">{{$erea->erea_name}}</option>
            @endforeach
            </select>
            <!-- ジャンル -->
            <select class="form-control block w-full px-3 py-1.5 mb-6 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b-2 border-solid border-black transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"  name="genre_id">
                <option hidden value="">ジャンル</option>
            @foreach ($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
            @endforeach
            </select>
            <!-- 紹介文章 -->
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">紹介文</label>
            <textarea id="message" name="overview" cols="200" rows="10" class="block p-2.5 mb-6 w-full text-sm text-gray-900 rounded-lg border border-black focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="コメント（200文字以内）"></textarea>
            <!-- 画像 -->
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" for="shop-img">画像</label>
            <input class="block mb-6 w-full text-sm text-gray-900 border-b border-gray-300 cursor-pointer dark:text-black focus:outline-none focus:border-transparent dark:border-black dark:placeholder-gray-400" id="shop-img" type="file" name="imagefile">
                @csrf
            <button type="submit" class="block w-full md:w-2/3 py-1 px-2 mb-6 rounded md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer mx-auto">作成</button>
            </div>
        </div>
    </div>
</form>
@endsection