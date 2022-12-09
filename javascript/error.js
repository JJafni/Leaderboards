var timer = 5;
var countdown = setInterval(() => {
    timer--;
    document.getElementById("timer").textContent = timer;

    if (timeleft <= 0) {
        clearInterval(countdown);
    }
}, 1000);

var redirect = setTimeout(() => {
    window.location = 'index'
}, 5000);