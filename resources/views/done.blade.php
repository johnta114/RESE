@extends('layouts.default')

@section('pageName')
    予約完了
@endsection

@section('content')
    <div class="md:w-96 h-60 rounded bg-white shadow-lg shadow-gray m-auto flex justify-center items-center">
        <div class="text-center ">
            <p class="text-lg mb-3">予約ありがとうございます。</p>
            <p class="text-lg mb-3">詳細はマイページにてご確認ください。</p>
            <form method="POST" action="/mypage">
                @csrf
                    <div>
                        <a href="/mypage" class="inline-block w-full md:w-auto text-base text-white bg-blue-600 hover:bg-blue-800 cursor-pointer rounded-md py-2 px-5"  onclick="event.preventDefault();this.closest('form').submit();">マイページへ</a>
                    </div>
            </form>
        </div>
    </div>
@endsection