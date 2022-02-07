$(function() {
    $.datetimepicker.setLocale('ja'); // 日本語化
    $('.datepicker').datetimepicker({
        timepicker:false, // 日付のみ表示
        format:'Y-m-d', // フォーマットの指定。オプションはカンマ区切りで複数指定可能
        minDate:'+1970/01/02',//昨日までの日付選択不可
        maxDate:'+1970/02/01'
    });
    $('.timepicker').datetimepicker({
        datepicker:false, // 時間のみ表示
        step:30, // 30分刻み
        format:'H:i', // フォーマットの指定。オプションはカンマ区切りで複数指定可能
        minTime:'6:00',//最小時間
        maxTime:'21:30',//最大時間
    });
});