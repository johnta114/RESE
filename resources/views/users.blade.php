@extends('layouts.default')

@section('pageName')
    ユーザー一覧
@endsection

@section('content')
    <div class="md:py-7 md:px-5 mb-10 bg-white rounded shadow-md shadow-gray-500 flex items-center md:left-10 right-0 md:right-10 bottom-0 md:-bottom-20">
        <div class="w-full md:px-4 rounded">
            <div class="text-center">
                <form action="/admin/users/search" method="POST">
                    @csrf
                    <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                        <input class="outline-none md:inline-block py-2 px-4 w-full cursor-text border-b border-solid border-transparent hover:border-b hover:border-orange-400  focus:border-b focus:border-orange-400 placeholder:text-black" type="text" name="name" value="{{old('name')}}" placeholder="名前">
                    </span>
                    <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                        <input class="outline-none md:inline-block py-2 px-4 w-full cursor-text border-b border-solid border-transparent hover:border-b hover:border-orange-400  focus:border-b focus:border-orange-400 placeholder:text-black" type="text" name="email" value="{{old('email')}}" placeholder="メールアドレス">
                    </span>
                    <span class="inline-block w-full md:w-3/12 md:border-l md:border-solid">
                        <select class="appearance-none outline-none py-2 px-4 w-full bg-white rounded-none cursor-pointer border-b border-transparent hover:border-orange-400 border-solid focus:border-b focus:border-solid focus:border-orange-400" name="role">
                            <option hidden value="">権限</option>
                            <option value="">全て</option>
                            <option value="1">管理者</option>
                            <option value="2">店舗責任者</option>
                        </select>
                    </span>
                    <button class="appearance-none outline-none py-2 px-6 w-full md:w-auto rounded-b md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">検索</button>
                </form>
            </div>
        </div>
    </div>

<div class="w-full">
    <div class="mb-5">
        <form method="POST" action="/admin/user/register">
            @csrf
            <button type="submit" class="text-base font-normal text-blue-400 border-b border-solid border-transparent hover:border-orange-400 hover:text-orange-400 cursor-pointer">ユーザー追加</button>
        </form>
    </div>
    <table class="w-full text-base text-black font-normal table-fixed">
        <tr class="w-full">
            <th class="w-1/3 md:w-1/5 pb-5">名前</th>
            <th class="w-1/3 md:w-2/5 pb-5">メールアドレス</th>
            <th class="w-1/5 hidden md:table-cell pb-5">権限</th>
            <th class="w-1/3 md:w-1/5 pb-5"></th>
        </tr>
        @foreach($users as $user)
            <tr class="w-full">
                <td class="w-1/3 md:w-1/5 text-center pb-3">{{$user->name}}</td>
                <td class="w-1/3 md:w-1/5 text-center truncate pb-3">{{$user->email}}</td>
                <td class="w-1/5 text-center hidden md:table-cell pb-3">
                    @if($user->role === 1)
                        管理者
                    @elseif($user->role === 2)
                        店舗責任者
                    @elseif($user->role === 3)
                        店舗従業員
                    @endif
                </td>
                <td class="w-1/3 md:w-1/5 text-center pb-3">
                    @if($user->name == 'admin')
                    @else
                        <form action="/admin/user/ditail" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button class="py-1 px-2 rounded md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">編集</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection