@extends('layouts.default')

@section('content')
<div class="w-full">
    <form method="POST" action="/owner/shop/register">
        @csrf
        <button type="submit" class="text-blue-600">店舗追加</button>
    </form>
    </form>
        <div class="w-4/5 flex justify-between items-center mx-auto">
            <div>店舗名</div>
            <div>エリア</div>
            <div>ジャンル</div>
            <div></div>
        </div>
        @foreach($shops as $shop)
        <div class="w-4/5 flex justify-between items-center mx-auto">
            <div>{{$shop->shop_name}}</div>
            <div>{{$shop->erea->erea_name}}</div>
            <div>{{$shop->genre->genre_name}}</div>
                <form action="/owner/shop/ditail" method="POST">
                    @csrf
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button class="cursor-pointer" type="submit">詳細・編集</button>
                </form>
            </div>
        </div>
        @endforeach
</div>

@endsection