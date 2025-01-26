const findBinBtn = document.querySelector('.find-bins-btn');

const allPlaceLocs = document.querySelectorAll('.place-location');

allPlaceLocs.forEach((placeLoc)=>{
    console.log(placeLoc.innerText);
});
findBinBtn.addEventListener('click',()=>{
    const allPlaceLocs = document.querySelectorAll('.place-location');
    const selectedPlace = document.querySelector('#place-selector');
    
    const inputPlace = selectedPlace.value;

    allPlaceLocs.forEach(placeLoc=>{
        if(placeLoc.innerText === inputPlace){
            placeLoc.style.display = 'block';
        }else{
            placeLoc.style.display = 'none';
        }
    })
})