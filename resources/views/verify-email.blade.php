@extends('layouts.default')

@section('pageName')
    会員登録 - STEP2 メール認証 -
@endsection

@section('content')
<div class="flex justify-center items-center gap-4 mb-5">
    <div class="w-10 h-10 text-base text-center leading-9 text-white bg-orange-400 rounded-full">1</div>
    <div class="w-10 h-1 bg-orange-400"></div>
    <div class="w-10 h-10 text-base text-center leading-9 text-white bg-orange-400 rounded-full">2</div>
    <div class="w-10 h-1 bg-gray-400"></div>
    <div class="w-10 h-10 text-base text-center leading-9 text-white bg-gray-400 rounded-full">3</div>
</div>
    <div class="mx-auto md:w-2/3 rounded bg-white shadow-lg shadow-gray py-5">
        <div class="text-center">
            <h2 class="font-bold pb-3 mx-auto">メールアドレス認証 </h2>
            <p class="text-sm md:text-base mb-3">登録したメールアドレスにメールを送信しました。</p>
            <p class="text-sm md:text-base mb-5">内容を確認の上登録を完了させてください。</p>
            @if (session('status') == 'verification-link-sent')
                <div class="text-xs md:text-base mb-3 font-medium text-green-600">登録したメールアドレスに新しいメールを送信しました。</div>
            @endif
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="text-center">
                    <button class="w-full md:w-auto text-sm bg-orange-400 text-white hover:opacity-80 rounded-md py-1.5 px-3 cursor-pointer ">
                        もう一度、認証メールを送信する
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
