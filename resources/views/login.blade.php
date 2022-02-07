@extends('layouts.default')

@section('content')
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="/login">
            @csrf
            <div class="mx-auto md:w-96 rounded bg-white shadow-lg shadow-gray flex justify-center items-center">
                <div class="w-10/12 mx-auto">
                <h2 class="text-lg text-center py-4">ログイン</h2>
                <!-- Email Address -->
                <div class="mb-3 w-full flex justify-between items-center">
                    <i class="far fa-envelope  pr-5"></i>
                    <input id="email" class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="メールアドレス" type="email" name="email" :value="old('email')" required autofocus />
                </div>
            <!-- Password -->
            <div class="mb-3 w-full flex justify-between items-center">
                <i class="fas fa-lock pr-5"></i>
                <input id="password" class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="パスワード" type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="text-right mb-2">
                <button class="w-full md:w-auto text-base text-white bg-blue-600 hover:bg-blue-800 cursor-pointer rounded-md py-2 px-5">ログイン</button>
            </div>
        </form>
            <div class="ml-2 mb-2">
                <a href="/register" class="text-sm border-b border-black text-black hover:text-gray-600 hover:border-gray-600">会員登録をしていない方</a>
            </div>
            <div class="ml-2 mb-4">
                <a href="{{ route('password.request') }}" class="text-sm border-b border-black text-black hover:text-gray-600 hover:border-gray-600">パスワードを忘れた方</a>
            </div>
@endsection