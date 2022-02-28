@extends('layouts.default')

@section('pageName')
    {{$shop->shop_name}}のレビュー
@endsection

@section('content')
<div class="w-full md:w-3/4 mx-auto">
    <h2 class="text-center text-2xl mb-5 font-bold">レビュー</h2>
    <form action="review/done" method="POST">
    <input type="hidden" name="shop_id" value="{{$shop->id}}">
        @csrf
        <div  class="md:flex justify-start items-center gap-5 mb-6">
            <div class="text-base text-black font-normal mr-10">評価</div>
            <div class="flex items-center mb-2 md:mb-0">
                <input id="option-1" type="radio" name="star" value="1" class="w-4 h-4" checked="">
                <label for="option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                    <i class="fas fa-star text-yellow-400"></i>
                </label>
            </div>
            <div class="flex items-center mb-2 md:mb-0">
                <input id="option-2" type="radio" name="star" value="2" class="w-4 h-4">
                <label for="option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:black">
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                </label>
            </div>
            <div class="flex items-center mb-2 md:mb-0">
                <input id="option-3" type="radio" name="star" value="3" class="w-4 h-4">
                <label for="option-3" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
            </label>
            </div>
            <div class="flex items-center mb-2 md:mb-0">
                <input id="option-4" type="radio" name="star" value="4" class="w-4 h-4">
                <label for="option-4" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
            </label>
            </div>
            <div class="flex items-center mb-2 md:mb-0">
                <input id="option-5" type="radio" name="star" value="5" class="w-4 h-4">
                <label for="option-5" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
            </label>
            </div>
        </div>
            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">コメント</label>
            <textarea id="comment" name="comment" cols="200" rows="10" class="block p-2.5 mb-6 w-full text-sm text-gray-900 rounded-lg border border-black" placeholder="コメント">{{old('comment')}}</textarea>
        </div>
        <div class="flex justify-center">
            <button class="appearance-none outline-none py-2 px-6 w-full md:w-1/2 rounded md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">送信</button>
        </div>
    </form>
</div>
@endsection