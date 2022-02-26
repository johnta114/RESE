<!DOCTYPE html>
<html lang="ja">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div>{{$user->name}}さん</div>
    <div>本日の来店予約一覧です。</div>
    <div>キャンセルはマイページからお願いします。</div>

    @foreach($reservations as $reservation)
    <table>
        <tr>
            <th>店名</th>
            <td>{{$reservation->shop->shop_name}}</td>
        </tr>
        <tr>
            <th>日付</th>
            <td>{{$reservation->reservation_date}}</td>
        </tr>
        <tr>
            <th>時間</th>
            <td>{{$reservation->reservation_time}}</td>
        </tr>
        <tr>
            <th>人数</th>
            <td>{{$reservation->number_people}}</td>
        </tr>
    </table>
    @endforeach
</body>
</html>
