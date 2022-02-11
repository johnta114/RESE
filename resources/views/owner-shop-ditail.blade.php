@extends('layouts.default')

@section('content')
    <div>
        <form action="/owner/shop/update" method="POST">
            @csrf
            <input type="hidden" name="shop_id" value="{{$shop->id}}">
            <div class="flex justify-start items-start gap-5">
                <div>店舗名</div>
                <div><input type="text" name="shop_name" value="{{$shop->shop_name}}"></div>
            </div>
            <div class="flex justify-start items-start gap-5">
                <div>エリア</div>
                <div>
                    <select name="erea_id">
                        <option hidden value="{{$shop->erea_id}}">{{$shop->erea->erea_name}}</option>
                    @foreach ($ereas as $erea)
                        <option value="{{$erea->id}}">{{$erea->erea_name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="flex justify-start items-start gap-5">
                <div>ジャンル</div>
                <div>
                    <select name="genre_id">
                        <option hidden value="{{$shop->genre_id}}">{{$shop->genre->genre_name}}</option>
                    @foreach ($genres as $genre)
                        <option value="{{$genre->genre_id}}">{{$genre->genre_name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="flex justify-start items-start gap-5">
                <div>紹介文章</div>
                <div>
                <textarea class="w-2/3 h-14"  cols="200" rows="10" name="overview">{{$shop->overview}}</textarea>
                </div>
            </div>
            <div class="flex justify-start items-start gap-5">
                <div>店舗責任者</div>
                <div>{{$shop->user->name}}</div>
            </div>
            <button class="cursor-pointer" type="submit">更新</button>
        </form>
        <div>
            <form action="/owner/shop/delete" method="POST">
                @csrf
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                <button class="cursor-pointer" type="submit">削除</button>
            </form>
        </div>
    </div>
@endsection