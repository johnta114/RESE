@extends('layouts.default')

@section('content')
<div class="w-full">
    <form method="POST" action="/admin/user/register">
        @csrf
        <button type="submit" class="text-blue-600">ユーザー追加</button>
    </form>
    </form>
        <div class="w-4/5 flex justify-between items-center mx-auto">
            <div>ユーザー名</div>
            <div>メールアドレス</div>
            <div>権限</div>
            <div></div>
        </div>
        @foreach($users as $user)
        <div class="w-4/5 flex justify-between items-center mx-auto">
            <div>{{$user->name}}</div>
            <div>{{$user->email}}</div>
            @if($user->role === 1)
                <div>管理者</div>
            @elseif($user->role === 2)
                <div>店舗責任者</div>
            @elseif($user->role === 3)
                <div>ユーザー</div>
            @endif
            <div>
            @if($user->name == 'admin')
            @else
                <form action="/admin/user/ditail" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <button class="cursor-pointer" type="submit">詳細・編集</button>
                </form>
            @endif
            </div>
        </div>
        @endforeach
</div>

@endsection