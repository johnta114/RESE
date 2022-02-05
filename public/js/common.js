// メニュー
const target = document.getElementById("menu");
target.addEventListener('click', () => {
    const nav = document.getElementById("nav");
    nav.classList.toggle('translate-x-full');
    const top = document.getElementById("top");
    top.classList.toggle('w-1/3');
    top.classList.toggle('w-2/3');
    top.classList.toggle('top-1/2');
    top.classList.toggle('rotate-45');
    const middle = document.getElementById("middle");
    middle.classList.toggle('opacity-0');
    const bottom = document.getElementById("bottom");
    bottom.classList.toggle('w-1/6');
    bottom.classList.toggle('w-2/3');
    bottom.classList.toggle('bottom-1/2');
    bottom.classList.toggle('-rotate-45');
});

function scrollTop(elem) {
    const target = document.getElementById(elem);
    target.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
}

scrollTop('button');

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