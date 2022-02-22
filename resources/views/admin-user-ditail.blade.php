@extends('layouts.default')

@section('content')
    <div class="w-full md:w-2/3 mx-auto">
        <form action="/admin/user/update" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="relative z-0 mb-6 w-full group">
                <input type="name" name="name" value="{{$user->name}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="fas fa-user pr-2"></i>性</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="email" name="email" value="{{$user->email}}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><i class="far fa-envelope pr-2"></i>メールアドレス</label>
            </div>
            @if($user->role === 1)
                <fieldset>
                    <legend class="sr-only">権限</legend>
                    <div class="flex items-center mb-4">
                        <input id="option-1" type="radio" name="role" value="1" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                        <label for="option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                        管理者
                        </label>
                    </div>
                        <div class="flex items-center mb-4">
                        <input id="option-2" type="radio" name="role" value="2" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="option-2" aria-describedby="option-2">
                        <label for="option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                        店舗責任者
                        </label>
                    </div>
                </fieldset>
                @elseif($user->role === 2)
                <fieldset>
                    <legend class="sr-only">権限</legend>
                    <div class="flex items-center mb-4">
                        <input id="option-1" type="radio" name="role" value="1" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="option-1" aria-describedby="option-1">
                        <label for="option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                        管理者
                        </label>
                    </div>
                        <div class="flex items-center mb-4">
                        <input id="country-option-2" type="radio" name="role" value="2" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="option-2" aria-describedby="option-2" checked="">
                        <label for="country-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-black">
                        店舗責任者
                        </label>
                    </div>
                </fieldset>
                @endif
            <button class="block w-full md:w-2/3 py-1 px-2 rounded md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer mx-auto" type="submit">更新</button>
        </form>
        @if($user->name == 'admin')
        @else
        <div class="mt-10 text-center">
            <form action="/admin/user/delete" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <button class="w-full md:w-2/3 py-1 px-2 rounded md:rounded bg-black text-white hover:opacity-80 cursor-pointer" type="submit">削除</button>
            </form>
        </div>
        @endif
    </div>
@endsection