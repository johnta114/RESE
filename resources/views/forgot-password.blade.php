@extends('layouts.default')

@section('pageName')
    パスワードリセット
@endsection

@section('content')
<div class="w-full md:w-2/3 bg-white rounded shadow-lg shadow-gray p-4 mx-auto">
    <div class="mb-4 text-sm text-blck text-center">
        登録したメールアドレスを入力してください。パスワードリセットリンクを送信します。
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <!-- Email Address -->
        <div class="relative z-0 mb-6 w-full group">
            <input type="email" name="email" value="{{old('email')}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="far fa-envelope pr-2"></i>メールアドレス</label>
        </div>
        <div class="flex items-center justify-center mt-4">
            <button class="w-full md:w-2/3 text-base bg-orange-400 text-white hover:opacity-80 cursor-pointer rounded-md py-2 px-5" >送信</button>
        </div>
    </form>

</div>

@endsection
