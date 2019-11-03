let navbar = document.querySelector(".navbar");
let sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        navbar.classList.add("sticky")
        if(window.pageYOffset > sticky+150)
            navbar.classList.add("material-darker")
    } else {
        navbar.classList.remove("material-darker");
    }
}

window.onscroll = function() {myFunction()}

document.querySelector('.brand').onclick = ()=> {
    let menu = document.querySelector('#menu')
    if(menu.classList.contains('open'))
        menu.classList.remove('open')
    else
        menu.classList.add('open')
}
