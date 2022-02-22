@extends('layouts.default')
@section('pageName')
    ログイン
@endsection
@section('content')
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="/login">
            @csrf
            <div class="mx-auto md:w-2/3 rounded bg-white shadow-lg shadow-gray flex justify-center items-center">
                <div class="w-10/12 mx-auto">
                <h2 class="text-lg text-center py-4">ログイン</h2>
                <!-- メールアドレス -->
                <div class="relative z-0 mb-6 w-full group">
                    <input type="email" name="email" value="{{old('email')}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="far fa-envelope pr-2"></i>メールアドレス</label>
                </div>
                <!-- パスワード -->
                <div class="relative z-0 mb-6 w-full group">
                    <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="fas fa-lock pr-2"></i>パスワード(8文字以上)</label>
                </div>
                <div class="mb-4 text-center">
                @csrf
                <button type="submit" class="w-full md:w-2/3 text-base bg-orange-400 text-white hover:opacity-80 cursor-pointer rounded-md py-2 px-5">ログイン</button>
            </div>
        </form>
        <div class="mb-2 text-center">
            <a href="/register" class="text-sm text-black hover:border-b hover:border-black hover:border-solid cursor-pointer">会員登録をしていない方</a>
        </div>
        <div class="mb-4 text-center">
            <a href="{{ route('password.request') }}" class="text-sm text-black hover:border-b hover:border-black hover:border-solid cursor-pointer">パスワードを忘れた方</a>
        </div>
@endsection