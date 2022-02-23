@extends('layouts.default')

@section('pageName')
    システム管理
@endsection

@section('content')
<div class="w-full mb-8 py-2 rounded">
    <ul class="flex justify-center items-center gap-10 text-base text-black font-nomal cursor-pointer">
        <li>
            <form action="/admin/users" method="POST">
                @csrf
                <button class="border-b border-solid border-transparent hover:border-black" type="submit">ユーザー一覧</button>
            </form>
        </li>
        <li>
            <form action="/admin/users" method="POST">
                @csrf
                <button class="border-b border-solid border-transparent hover:border-black" type="submit">店舗一覧</button>
            </form>
        </li>
    </ul>
</div>

@endsection