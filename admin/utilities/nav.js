const navBars = document.querySelector('.fa-bars');
const cutBtn = document.querySelector('.fa-x');
const sliderNav = document.querySelector('.nav-slider');
navBars.addEventListener('click', () => {
    sliderNav.style.right = '0';
});

cutBtn.addEventListener('click', () => {
    sliderNav.style.right = '-60vh';
});