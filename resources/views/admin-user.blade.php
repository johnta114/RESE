@extends('layouts.default')

@section('content')
<div class="w-full">
    <div class="mb-5">
        <form method="POST" action="/admin/user/register">
            @csrf
            <button type="submit" class="text-base font-normal text-blue-400 border-b border-solid border-transparent hover:border-orange-400 hover:text-orange-400 cursor-pointer">ユーザー追加</button>
        </form>
    </div>
    <table class="w-full text-base text-black font-normal">
        <tr>
            <th class="w-1/5">名前</th>
            <th class="w-2/5">メールアドレス</th>
            <th class="w-1/5">権限</th>
            <th class="w-1/5">アクション</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center ">{{$user->email}}</td>
                <td class="text-center">
                    @if($user->role === 1)
                        管理者
                    @elseif($user->role === 2)
                        店舗責任者
                    @elseif($user->role === 3)
                        店舗従業員
                    @endif
                </td>
                <td class="text-center">
                    @if($user->name == 'admin')
                    @else
                        <form action="/admin/user/ditail" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button class="cursor-pointer" type="submit">詳細・編集</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection