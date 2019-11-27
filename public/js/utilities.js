$ = (id) => document.querySelector(id)
inyectCSS = (element, css) => Object.keys(css).forEach(style => element.style[style] = css[style])

crearWea = (type, props) =>{
    let e = document.createElement(type)
    Object.keys(props).forEach(prop => {
        if(prop == 'style') inyectCSS(e, props[prop])
        else e[prop] = props[prop]
    })
    return e
}

let navbar = document.querySelector(".navbar");
let sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky){
        navbar.classList.add("sticky")
        if(window.pageYOffset > sticky+150)
            navbar.classList.add("cold-lightgrey")
    } else {
        navbar.classList.remove("cold-lightgrey");
    }
}

window.onscroll = function() {myFunction()}

document.querySelector('.expand').onclick = ()=> {
    let menu = document.querySelector('#menu')
    if(menu.classList.contains('open'))
        menu.classList.remove('open')
    else{
        menu.classList.add('open')
        // navbar.classList.remove("fwhite");
        navbar.classList.remove("fwhite");
    }/*
    else{
        menu.classList.add('open')
        navbar.classList.add("fwhite")
    }*/
}

getDocument = (uri) => {
    let data = []
    fetch(uri).then(resp=>resp.text()).then(text=>data.push(text))
    return data
}
