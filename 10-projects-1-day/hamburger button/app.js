const btn = document.getElementById('btn')
const nav = document.getElementById('nav');

btn.addEventListener('click', (e)=>{

    btn.classList.toggle('active');
    nav.classList.toggle('active');

    if(e.target.classList.contains('active')){
        btn.textContent = 'X'
    }else{
        btn.textContent = '☰'

    }
})