let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
}
window.onscroll = () =>{
    loginForm.classList.remove('active');
}

const sideMenu = document.querySelector('aside');
const menuBtn = document.querySelector('#menu-btn')
const closeBtn = document.querySelector('#close-btn')

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

function checker() {
    var result = confirm('Are you sure?');
    if (result == false){
        event.preventDefault;
    }
}
function checkerEdit() {
    var result = confirm('Are you sure you want to update?');
    if (result == false){
        event.preventDefault;
    }
}