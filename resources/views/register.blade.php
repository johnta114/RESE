@extends('layouts.default')

@section('content')
<form method="POST" action="/register">
    @csrf
    <div class="mx-auto w-96 rounded bg-white shadow-lg shadow-gray flex justify-center items-center">
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
                <input id="password" class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="パスワード" type="password" name="password" required autocomplete="new-password" />
            </div>
            @error('password')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
            <!-- パスワード確認 -->
            <div class="mb-3 w-full flex justify-between items-center">
                <i class="fas fa-lock pr-5"></i>
                <input id="password_confirmation" class="form-control block w-full px-3 py-1.5 text-sm font-normal text-gray-700 bg-white bg-clip-padding border-b border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none placeholder-black" placeholder="パスワード確認" type="password" name="password_confirmation" required />
            </div>
            <div class="text-right mb-4">
                <button type="submit" class="text-xs text-white bg-blue-600 rounded-md py-1.5 px-3 ">登録</button>
            </div>
        </div>
    </div>
</form>
@endsection