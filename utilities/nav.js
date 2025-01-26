const navBars = document.querySelector('.fa-bars');
const sliderNav = document.querySelector('.nav-slider')
navBars.addEventListener('click',()=>{
    sliderNav.style.right = '0px';
})

const crossBtn = document.querySelector('.fa-x');
crossBtn.addEventListener('click',()=>{
    sliderNav.style.right = '-500px';
})