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

document.querySelector('.expand').onclick = ()=> {
    let menu = document.querySelector('#menu')
    if(menu.classList.contains('open'))
        menu.classList.remove('open')
<<<<<<< HEAD
    else
        menu.classList.add('open')
=======
        // navbar.classList.remove("fwhite");
    }
    else{
        menu.classList.add('open')
        // navbar.classList.add("fwhite")
    }
>>>>>>> edham
}
