@extends('layouts.default')

@section('content')
<form method="POST" action="/register">
    @csrf
    <div class="mx-auto md:w-96 rounded bg-white shadow-lg shadow-gray flex justify-center items-center">
        <div class="w-10/12 mx-auto">
            <h2 class="text-lg text-center py-4">会員登録</h2>
            <!-- Name -->
            <div class="mb-3 w-full flex justify-between items-center">
                <i class="fas fa-user pr-5"></i>
                <input id="name" class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="お名前" type="text" name="name" value="{{old('name')}}" required autofocus />
            </div>
            <!-- Email Address -->
            @error('name')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
            <div class="mb-3 w-full flex justify-between items-center">
                <i class="far fa-envelope  pr-5"></i>
                <input id="email" class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="メールアドレス" type="email" name="email" value="{{old('email')}}" required />
            </div>
            @error('email')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
            <!-- パスワード -->
            <div class="mb-3 w-full flex justify-between items-center">
                <i class="fas fa-lock pr-5"></i>
                <input id="password" class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="パスワード(8文字以上)" type="password" name="password" required autocomplete="new-password" />
            </div>
            <!-- パスワード確認 -->
            <div class="mb-3 w-full flex justify-between items-center">
                <i class="fas fa-lock pr-5"></i>
                <input id="password_confirmation" class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="パスワー(確認用)" type="password" name="password_confirmation" required />
            </div>
            @error('password')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
            <div class="text-right mb-2">
                <button type="submit" class="text-base text-white bg-blue-600 hover:bg-blue-800 cursor-pointer rounded-md py-2 px-5 ">登録</button>
            </div>
            <div class="ml-2 mb-4">
                <a href="/login" class="text-sm border-b border-black text-black hover:text-gray-600 hover:border-gray-600 cursor-pointer">会員登録をしている方</a>
            </div>
        </div>
    </div>
</form>
@endsection