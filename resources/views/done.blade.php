@extends('layouts.default')

@section('pageName')
    予約完了
@endsection

@section('content')
    <div class="w-full md:w-96 h-60 rounded bg-white shadow-lg shadow-gray m-auto flex justify-center items-center">
        <div class="text-center w-full p-2">
            <p class="text-base mb-3">予約ありがとうございます。</p>
            <p class="text-base mb-3">詳細はマイページにてご確認ください。</p>
            <form method="POST" action="/mypage">
                @csrf
                    <div>
                        <a href="/mypage" class="inline-block py-2 px-6 w-full md:w-auto rounded md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" onclick="event.preventDefault();this.closest('form').submit();">マイページへ</a>
                    </div>
            </form>
        </div>
    </div>
@endsection