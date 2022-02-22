@extends('layouts.default')

@section('pageName')
    会員登録 - STEP1 入力フォーム -
@endsection

@section('content')
@if(Request::is('admin/user/register'))
<form method="POST" action="/admin/user/register/create">
@else
<form method="POST" action="/register">
    <div class="flex justify-center items-center gap-4 mb-5">
        <div class="w-10 h-10 text-base text-center leading-9 text-white bg-orange-400 rounded-full">1</div>
        <div class="w-10 h-1 bg-gray-400"></div>
        <div class="w-10 h-10 text-base text-center leading-9 text-white bg-gray-400 rounded-full">2</div>
        <div class="w-10 h-1 bg-gray-400"></div>
        <div class="w-10 h-10 text-base text-center leading-9 text-white bg-gray-400 rounded-full">3</div>
    </div>
@endif
    <div class="mx-auto md:w-2/3 rounded bg-white shadow-lg shadow-gray flex items-center">
        <div class="w-10/12 mx-auto">
            <h2 class="text-lg text-center py-4">会員情報入力</h2>
            <!-- 名前 -->
            <div class="md:flex md:justify-between items-center gap-5">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="name" name="first_name" value="{{old('first_name')}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="fas fa-user pr-2"></i>性</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="last_name" name="last_name" value="{{old('last_name')}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="last_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="fas fa-user pr-2"></i>名</label>
                </div>
            </div>
            @error('name')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
            <!-- メールアドレス -->
            <div class="relative z-0 mb-6 w-full group">
                <input type="email" name="email" value="{{old('email')}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="far fa-envelope pr-2"></i>メールアドレス</label>
            </div>
            @error('email')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
            <!-- パスワード -->
            <div class="relative z-0 mb-6 w-full group">
                <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="fas fa-lock pr-2"></i>パスワード(8文字以上)</label>
            </div>
            <!-- パスワード確認 -->
            <div class="relative z-0 mb-6 w-full group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="password_confirmation" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="fas fa-lock pr-2"></i>パスワード(確認用)</label>
            </div>
            @error('password')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
            @if(Request::is('admin/user/register'))
                <input type="hidden" name="role" value="2">
            @endif
            <div class="mb-4 text-center">
                @csrf
                <button type="submit" class="w-full md:w-2/3 text-base bg-orange-400 text-white hover:opacity-80 cursor-pointer rounded-md py-2 px-5">登録</button>
            </div>
            <div class="ml-2 mb-5 text-center">
                <a href="/login" class="text-sm text-black hover:border-b hover:border-black hover:border-solid cursor-pointer">会員登録をしている方</a>
            </div>
        </div>
    </div>
</form>
@endsection