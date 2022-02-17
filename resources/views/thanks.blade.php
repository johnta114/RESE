@extends('layouts.default')

@section('content')

<div class="flex justify-center items-center gap-4 mb-5">
    <div class="w-10 h-10 text-base text-center leading-9 text-white bg-orange-400 rounded-full">1</div>
    <div class="w-10 h-1 bg-orange-400"></div>
    <div class="w-10 h-10 text-base text-center leading-9 text-white bg-orange-400 rounded-full">2</div>
    <div class="w-10 h-1 bg-orange-400"></div>
    <div class="w-10 h-10 text-base text-center leading-9 text-white bg-orange-400 rounded-full">3</div>
</div>
    <div class="mx-auto md:w-2/3 rounded bg-white shadow-lg shadow-gray py-5">
        <div class="text-center">
            <h2 class="font-bold pb-3 mx-auto">登録完了 </h2>
            <p class="text-sm md:text-base mb-3">会員登録ありがとうございます。。</p>
            <div class="text-center">
                <a href="/" class="w-full md:w-auto text-sm bg-orange-400 text-white hover:opacity-80 cursor-pointer rounded-md py-1.5 px-5">ホームへ</a>
            </div>
        </div>
    </div>
@endsection