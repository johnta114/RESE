@extends('layouts.default')

@section('content')

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="/login">
            @csrf
            <div class="mx-auto w-96 rounded bg-white shadow-lg shadow-gray flex justify-center items-center">
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
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">ログイン状態を記憶する</span>
                </label>
            </div>
            <div class="text-right mb-4">
                <button class="text-xs text-white bg-blue-600 rounded-md py-1.5 px-3 ">ログイン</button>
            </div>
        </form>

@endsection