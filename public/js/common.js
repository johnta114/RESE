// メニュー
const target = document.getElementById("menu");
target.addEventListener('click', () => {
    const nav = document.getElementById("nav");
    nav.classList.toggle('-translate-x-full');
    const top = document.getElementById("top");
    top.classList.toggle('top-1/2');
    top.classList.toggle('rotate-45');
    const middle = document.getElementById("middle");
    middle.classList.toggle('opacity-0');
    const bottom = document.getElementById("bottom");
    bottom.classList.toggle('bottom-1/2');
    bottom.classList.toggle('-rotate-45');
});

