@extends('layouts.default')

@section('content')
    <div>
        <form action="/owner/users" method="POST">
            @csrf
            <button class="cursor-pointer" type="submit">従業員一覧</button>
        </form>
        <form action="/owner/shops" method="POST">
            @csrf
            <button class="cursor-pointer" type="submit">店舗一覧</button>
        </form>
    </div>
@endsection