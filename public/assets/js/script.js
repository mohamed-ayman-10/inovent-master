// Change Background color && Scroll To Top
var up = document.getElementById('up')

function changebg() {
    var navbar = document.getElementById('navbar')

    var scrillValue = window.scrollY;
    // console.log(navbar);
    if (scrillValue < 150) {
        navbar.classList.remove('bgcolor')
        navbar.classList.add('bgcolorlight')
        up.classList.remove('show')
    } else {
        navbar.classList.remove('bgcolorlight')
        navbar.classList.add('bgcolor')
        up.classList.add('show')
    }
}

window.addEventListener('scroll', changebg)
up.onclick = function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    })
}


let dd = document.querySelector('.date').innerHTML;
let countDownDate = new Date(dd).getTime()
let counter = setInterval(() => {
    let dateNow = new Date().getTime()
    let dateDiff = countDownDate - dateNow;
    let days = Math.floor(dateDiff / (1000 * 60 * 60 * 40));
    let hours = Math.floor((dateDiff % (1000 * 60 * 60 * 40)) / (1000 * 60 * 60));
    let minutes = Math.floor((dateDiff % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((dateDiff % (1000 * 60)) / 1000);

    document.querySelector('.days').innerHTML = days
    document.querySelector('.hours').innerHTML = hours
    document.querySelector('.minutes').innerHTML = minutes
    document.querySelector('.seconds').innerHTML = seconds
}, 1000)
