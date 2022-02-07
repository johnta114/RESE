@extends('layouts.default')

@section('content')
<div class="mx-auto bg-white rounded p-5">
    <div class="text-center">
        <h2 class="font-bold pb-3 mx-auto">メールアドレス確認 </h2>
        <p class="pb-3">登録したメールアドレス確認のため、認証メールを送信しました。</p>
        <p class="pb-3">メールが届かない場合は、下記ボタンをクリックしてください。</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">登録したメールアドレスに新しい認証メールが送信されました。</div>
    @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
        <div class="text-center">
            <button class="w-full md:w-auto text-sm text-white bg-blue-600 rounded-md py-1.5 px-3 cursor-pointer hover:bg-blue-800">
                もう一度、認証メールを送信する
            </button>
        </div>
    </form>
</div>
@endsection
