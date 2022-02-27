@extends('layouts.default')

@section('pageName')
    メール作成
@endsection

@section('content')
<div class="w-full md:w-3/4 mx-auto">
    <h2 class="text-center text-2xl mb-5 font-bold">メール作成</h2>
    <form action="mail/send" method="POST">
        @csrf
        <div  class="flex justify-start items-center gap-5 mb-6">
            <div class="text-base text-black font-normal mr-10">宛先</div>
            <div class="flex items-center">
                <input id="user-option-1" type="radio" name="address" value="all" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:border-gray-600" aria-labelledby="user-option-1" aria-describedby="user-option-1" checked="">
                <label for="user-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                    全ユーザー
                </label>
            </div>
            <div class="flex items-center">
                <input id="user-option-2" type="radio" name="address" value="owner" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:border-gray-600" aria-labelledby="user-option-2" aria-describedby="user-option-2">
                <label for="user-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:black">
                    全店舗責任者
                </label>
            </div>
            <div class="flex items-center">
                <input id="user-option-3" type="radio" name="address" value="user" class="w-4 h-4 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:border-gray-600" aria-labelledby="user-option-3" aria-describedby="user-option-3">
                <label for="user-option-3" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                    全利用者
            </label>
            </div>
        </div>
        <div class="relative z-0 mb-6 w-full group">
            <input type="text" name="subject" value="{{old('subject')}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="subject" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">件名</label>
        </div>
        <div>
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">本文</label>
            <textarea id="message" name="message" cols="200" rows="10" class="block p-2.5 mb-6 w-full text-sm text-gray-900 rounded-lg border border-black focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="本文">{{old('message')}}</textarea>
        </div>
        <div class="flex justify-center">
            <button class="appearance-none outline-none py-2 px-6 w-full md:w-1/2 rounded-b md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">送信</button>
        </div>
    </form>
</div>
@endsection