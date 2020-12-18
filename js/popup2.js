document.getElementById('button').addEventListener('click',

function() { 
    
    document.querySelector('.popup').style.display = 'flex';
    document.body.style.overflow = "hidden";
    
   
});


document.querySelector('#close').addEventListener('click',
function(){

    document.querySelector('.popup').style.display='none';

});


document.querySelector('.popup').addEventListener('click',
function(){

    document.querySelector('.popup').style.display='none';
    
});








    
document.getElementById('button2').addEventListener('click',

function() { 

    document.querySelector('.popup2').style.display = 'flex';

});

document.querySelector('#close2').addEventListener('click',
function(){

    document.querySelector('.popup2').style.display='none';

});


document.querySelector('.popup2').addEventListener('click',
function(){

    document.querySelector('.popup2').style.display='none';

});












