
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