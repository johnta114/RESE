@extends('layouts.default')



@section('content')
</div>
    @if(!$reservationsExists)
        <div class="texy-center mb-5">
            <h3 class="text-lg text-orange-400 font-normal text-center">現在、予約がありません。</h3>
        </div>
    @endif
    <table class="w-full text-base text-black font-normal table-fixed">
        <tr class="w-full">
            <th class="w-1/3 md:w-1/5 pb-5">日付</th>
            <th class="w-1/5 hidden md:table-cell pb-5">時間</th>
            <th class="w-1/5 hidden md:table-cell pb-5">人数</th>
            <th class="w-1/3 md:w-1/5 pb-5">名前</th>
            <th class="w-1/3 md:w-1/5 pb-5"></th>
        </tr>
        @foreach($reservations as $reservation)
            <tr class="w-full">
                <td class="w-1/3 md:w-1/5 text-center pb-3">{{$reservation->reservation_date}}</td>
                <td class="w-1/5 text-center hidden md:table-cell pb-3">{{substr($reservation->reservation_time, 0, 5)}}</td>
                <td class="w-1/5 text-center hidden md:table-cell pb-3">{{$reservation->number_people}}</td>
                <td class="w-1/3 md:w-1/5 text-center pb-3">{{$reservation->user->name}}</td>
                <td class="w-1/3 md:w-1/5 text-center pb-3">
                    @if($reservation->visited_at == null)
                    <form action="/owner/shop/visit" method="POST">
                        @csrf
                        <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                        <input type="hidden" name="shop_id" value="{{$reservation->shop_id}}">
                        <button class="py-1 px-2 rounded md:rounded bg-orange-400 text-white hover:opacity-80 cursor-pointer" type="submit">来店</button>
                    </form>
                    @else
                    {{substr($reservation->visited_at, 0, 16)}}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection