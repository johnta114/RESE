const openBtn = document.getElementById('openBtn');
const closeBtn = document.getElementById('closeBtn');

openBtn.addEventListener('click', () => {
    const modal = document.getElementById('modal');
    modal.classList.remove = 'hidden';
    modal.classList.add = 'block';
})
closeBtn.addEventListener('click', () => {
    modal.classList.remove = 'block';
  modal.classList.add = 'hidden';
});