@extends('layouts.default')

@section('content')
    <div>
        <form action="/admin/users" method="POST">
            @csrf
            <button class="cursor-pointer" type="submit">ユーザ一覧</button>
        </form>
    </div>
@endsection