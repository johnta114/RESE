@extends('layouts.default')

@section('content')
    <div>
        <form action="/admin/user/update" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="flex justify-start items-start gap-5">
                <div>ユーザー名</div>
                <div><input type="text" name="name" value="{{$user->name}}"></div>
            </div>
            <div class="flex justify-start items-start gap-5">
                <div>メールアドレス</div>
                <div><input type="email" name="email" value="{{$user->email}}"></div>
            </div>
            <div class="flex justify-start items-start gap-5">
                <div>権限</div>
                <div>
                    <select name="role">
                        <option hidden selected value="{{$user->lore}}">
                        @if($user->role === 1)
                            管理者
                        @elseif($user->role === 2)
                            店舗責任者
                        @elseif($user->role === 3)
                            ユーザー
                        </option>
                        @endif
                        <option value="1">管理者</option>
                        <option value="2">店舗責任者</option>
                    </select>
                </div>
            </div>
            <button class="cursor-pointer" type="submit">更新</button>
        </form>
        @if($user->name == 'admin')
        @else
        <div>
            <form action="/admin/user/delete" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <button class="cursor-pointer" type="submit">削除</button>
            </form>
        </div>
        @endif
    </div>
@endsection